<?php

$cat    = currentCat ();
$catttt = new Categories ($cat);
switch ($act)
{
    case "detail":
        Detail ();
        $tpl = "detail";
        break;

    case 'search':
        Search ();
        $title_page = CAT_SEARCH_RESULT;
        $tpl        = "list";
        break;

    case "tag":
        Tag ();
        $tpl        = "list";
        $title_page = "Tag";
        break;

    default:

        if ($catttt->getcategories_displaytype () == 5)
        {
            $tpl = "list_cat";
            ShowListCat ();
        }
        else
        {
            ShowList ();
            $tpl = "list";
        }
}

function ShowListCat ()
{
    global $page, $plpage, $articles, $tpl;

    $cat          = new Categories (currentCat ());
    $set_per_page = Info::getInfoField ('paging_article');

    $result   = $cat->getChilds_PID2 ($page, $set_per_page, 0);
    $plpage   = $result['paging'];
    $articles = $result['list'];

    if (!isset ($articles[0]['id']))
    {
        ShowList ();
        $tpl = "list";
    }
}


function Detail ()
{
    global $db, $seo, $lg, $title_page, $keywords, $descriptions, $article, $uniqueKey;

    $key = $uniqueKey;

    //  $article = new articles(getItemByKeywithtable('articles',$key));

    $sql  = "select * from articles where unique_key_$lg='$key'";
    $rows = $db->getRow ($sql);

    //  $article = new articles(getItemByKey($key));
    $article         = new articles ($rows);
    $article->countView ();
    $seo['seo_f_vn'] = "<h1>" . $article->getName () . "</h1><p>" . $article->getShort () . "</p>";
    $title_page      = $article->getTitle ();
    $keywords        = $article->getKeyword ();
    $descriptions    = $article->getDescription ();
}

function Tag ()
{
    global $articles, $page, $plpage, $title_bar, $FullUrl;



    /*

      $keyword = SafeQueryString("keyword");
      $result = getTag($keyword, $page, $set_per_page);

      $title_bar = $result['title_bar'];
      $plpage = $result['paging'];
      $articles = $result['list'];
     */

    $keyword = SafeQueryString ("keyword");

    global $db, $articles, $page, $plpage, $set_per_page, $c, $cat, $title_bar, $lg, $title_page, $keywords, $descriptions, $tag;
    $set_per_page = Info::getInfoField ('paging_article');
    if (!empty ($keyword))
    {
        global $db;

        $sql = "select tags_keyword, tags_name from tags where tags_unique_key = '$keyword'";

        $tag = $db->getRow ($sql);

        $title_page = $tag["tags_keyword"] . " tất cả thông tin, bài viết về liên quan";

        $title_bar = "<ul class='navigation'><li><a href='$FullUrl/'>Trang chủ</a>  </li><li>Tag</li></ul>";



        $keyword = $tag["tags_keyword"];
        $sql     = "select *, (select count(cmt_id) from comments where cmt_article_id = id) as num_of_comments from articles where (name_" . $lg . " like '%" . $keyword . "%' or short_" . $lg . " like '%" . $keyword . "%' or content_" . $lg . " like '%" . $keyword . "%') and active = 1";

        $c        = $db->numRows ($db->query ($sql));
        $plpage   = plpage_seo_tag ($sql, $page, $set_per_page);
        $sqlstmt  = sqlmod ($sql, $page, $set_per_page);
        $articles = $db->getAll ($sqlstmt);


        //seo
        $keywords     = $tag["tags_keyword"] . ', ' . str_replace ('-', ' ', $keyword);
        $descriptions = $tag["tags_keyword"] . " tất cả thông tin, bài viết bổ ích và đầy đủ liên quan";
    }
}

function Search ()
{
    global $page, $plpage, $articles, $title_bar;

    $key       = SafeQueryString ('key');
    $title_bar = CAT_SEARCH_RESULT;

    if (!empty ($key))
    {
        $set_per_page = Info::getInfoField ('paging_article');
        $result       = searchKey ($key, $page, $set_per_page);
        $plpage       = $result['paging'];
        $articles     = $result['list'];
    }
}

function ShowList ()
{
    global $page, $plpage, $articles, $tpl;

    $cat          = new Categories (currentCat ());
    $set_per_page = Info::getInfoField ('paging_article');

    if ($cat->getID () == 985)
    {
        $result = $cat->getList ($page, $set_per_page, 1);
    }
    else
        $result = $cat->getList ($page, $set_per_page);

    $plpage   = $result['paging'];
    $articles = $result['list'];
}
?>