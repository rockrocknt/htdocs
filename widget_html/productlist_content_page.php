<div class="toolbar-bottom">
                            <div class="toolbar">
                                <!-- Pagination -->
                                <div class="pagination-container">
                                    
                                    <nav class="pagination">
										<?php 
										// plpage_seo_sort in functions.php
											echo $plpage;
										?>
										<?php /*
                                        <ul>
                                            <li class="Active">1</li>
                                            <li><a href="/hoa-hong-leo/?&amp;page=2">2</a></li>
                                            <li><a href="/hoa-hong-leo/?&amp;page=3">3</a></li>
                                            <li><a href="/hoa-hong-leo/?&amp;page=2" class="Next">Next</a></li>
                                            <li><a href="/hoa-hong-leo/?&amp;page=9" class="Prev">Prev</a></li>
                                            <li><a href="/hoa-hong-leo/?&amp;page=9" class="Last">Last</a></li>
                                        </ul>
										*/ ?>
                                    </nav>
                                </div>
                                <div class="count-container">
                                        <p class="amount amount--has-pages">
                    <span>
					<?php 
					global $countTotal;
					$set_per_page = Info::getInfoField('paging_product');
					if (getquery("viewall") == "1" ) {
						$set_per_page = 1;
					} 
					$page   = isset($_GET["page"])  ? $_GET["page"]  : '1';//for paging
					$from = $page * $set_per_page - $set_per_page + 1;
					
					$to = $from + $set_per_page - 1;
					if ($set_per_page == 1) {
						$to = $countTotal;
					}
					?>
                    <?php echo $from; ?> - <?php echo $to; ?> của <?php 
					echo $countTotal; ?> sản phẩm                    </span>
                                            <span>-</span>
                                            <a href="/<?php echo $currentcat['unique_key_vn']; ?>/?viewall=1" title="Tất cả sản phẩm">
                                                Tất cả sản phẩm </a>
                                        </p>
                                    </div>
                            </div>
                        </div>
						
<?php return; ?>

<div class="toolbar-bottom">
                <div class="toolbar">
                       
                    
        <div class="pager">
            <div class="count-container">
                <p class="amount amount--has-pages">
                    <span>
                    1-30 of 128 results                    </span>
                                                                                            <span>-</span>
                            <a href="http://www.davidaustinroses.co.uk/type/english-roses?limit=all" title="View All Products">
                                View All                            </a>
                                                            </p>
            </div>
                        <div class="pages">
            <strong>Page</strong>
            <ol>
                
                
                
                                                            <li class="current">1</li>
                                                                                <li><a href="http://www.davidaustinroses.co.uk/type/english-roses?p=2">2</a></li>
                                                                                <li><a href="http://www.davidaustinroses.co.uk/type/english-roses?p=3">3</a></li>
                                                                                <li><a href="http://www.davidaustinroses.co.uk/type/english-roses?p=4">4</a></li>
                                                                                <li><a href="http://www.davidaustinroses.co.uk/type/english-roses?p=5">5</a></li>
                                    

                
                
                                    <li>
                        <a class="next i-next" href="http://www.davidaustinroses.co.uk/type/english-roses?p=2" title="Next">
                                                            Next                                                    </a>
                    </li>
                            </ol>

        </div>
            </div>

                    <div class="sort-by">
                <label>Sort By</label>
                <div class="selectbox-container">
                                    <select onchange="setLocation(this.value)" title="Sort By">
                        				   			                                    <option value="http://www.davidaustinroses.co.uk/type/english-roses?order=rose_rating&amp;dir=desc" selected="selected">Default                                    </option>
                                                  				   			                                        <option value="http://www.davidaustinroses.co.uk/type/english-roses?order=price&amp;dir=desc">
                                        Price: High to Low                                        </option>
                                        <option value="http://www.davidaustinroses.co.uk/type/english-roses?order=price&amp;dir=asc">
                                        Price: Low to High                                        </option>
                                                          				   			                                   <option value="http://www.davidaustinroses.co.uk/type/english-roses?order=name&amp;dir=asc">
                                    Name: A to Z                                    </option>
                                    <option value="http://www.davidaustinroses.co.uk/type/english-roses?order=name&amp;dir=desc">
                                    Name: Z to A                                     </option>
                                                             				   			                                    <option value="http://www.davidaustinroses.co.uk/type/english-roses?order=introduction_year&amp;dir=desc">Newest                                    </option>
                                                                      </select>
                </div>

                            </div>
            </div>
    </div>