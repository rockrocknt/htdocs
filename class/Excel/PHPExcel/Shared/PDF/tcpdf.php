<?php
//============================================================+
// File name   : tcpdf.php
// Version     : 5.9.009
// Begin       : 2002-08-03
// Last Update : 2010-10-21
// Author      : Nicola Asuni - Tecnick.com S.r.l - Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2002-2010  Nicola Asuni - Tecnick.com S.r.l.
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with TCPDF.  If not, see <http://www.gnu.org/licenses/>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description : This is a PHP class for generating PDF documents without
//               requiring external extensions.
//
// NOTE:
//   This class was originally derived in 2002 from the Public
//   Domain FPDF class by Olivier Plathey (http://www.fpdf.org),
//   but now is almost entirely rewritten and contains thousands of
//   new lines of code and hundreds new features.
//
// Main features:
//  * no external libraries are required for the basic functions;
//  * all standard page formats, custom page formats, custom margins and units of measure;
//  * UTF-8 Unicode and Right-To-Left languages;
//  * TrueTypeUnicode, OpenTypeUnicode, TrueType, OpenType, Type1 and CID-0 fonts;
//  * font subsetting;
//  * methods to publish some XHTML + CSS code, Javascript and Forms;
//  * images, graphic (geometric figures) and transformation methods;
//  * supports JPEG, PNG and SVG images natively, all images supported by GD (GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM) and all images supported via ImagMagick (http://www.imagemagick.org/www/formats.html)
//  * 1D and 2D barcodes: CODE 39, ANSI MH10.8M-1983, USD-3, 3 of 9, CODE 93, USS-93, Standard 2 of 5, Interleaved 2 of 5, CODE 128 A/B/C, 2 and 5 Digits UPC-Based Extention, EAN 8, EAN 13, UPC-A, UPC-E, MSI, POSTNET, PLANET, RMS4CC (Royal Mail 4-state Customer Code), CBC (Customer Bar Code), KIX (Klant index - Customer index), Intelligent Mail Barcode, Onecode, USPS-B-3200, CODABAR, CODE 11, PHARMACODE, PHARMACODE TWO-TRACKS, QR-Code, PDF417;
//  * Grayscale, RGB, CMYK, Spot Colors and Transparencies;
//  * automatic page header and footer management;
//  * document encryption up to 256 bit and digital signature certifications;
//  * transactions to UNDO commands;
//  * PDF annotations, including links, text and file attachments;
//  * text rendering modes (fill, stroke and clipping);
//  * multiple columns mode;
//  * no-write page regions;
//  * bookmarks and table of content;
//  * text hyphenation;
//  * text stretching and spacing (tracking/kerning);
//  * automatic page break, line break and text alignments including justification;
//  * automatic page numbering and page groups;
//  * move and delete pages;
//  * page compression (requires php-zlib extension);
//  * XOBject Templates;
//
// -----------------------------------------------------------
// THANKS TO:
//
// Olivier Plathey (http://www.fpdf.org) for original FPDF.
// Efthimios Mavrogeorgiadis (emavro@yahoo.com) for suggestions on RTL language support.
// Klemen Vodopivec (http://www.fpdf.de/downloads/addons/37/) for Encryption algorithm.
// Warren Sherliker (wsherliker@gmail.com) for better image handling.
// dullus for text Justification.
// Bob Vincent (pillarsdotnet@users.sourceforge.net) for <li> value attribute.
// Patrick Benny for text stretch suggestion on Cell().
// Johannes Güntert for JavaScript support.
// Denis Van Nuffelen for Dynamic Form.
// Jacek Czekaj for multibyte justification
// Anthony Ferrara for the reintroduction of legacy image methods.
// Sourceforge user 1707880 (hucste) for line-trough mode.
// Larry Stanbery for page groups.
// Martin Hall-May for transparency.
// Aaron C. Spike for Polycurve method.
// Mohamad Ali Golkar, Saleh AlMatrafe, Charles Abbott for Arabic and Persian support.
// Moritz Wagner and Andreas Wurmser for graphic functions.
// Andrew Whitehead for core fonts support.
// Esteban Joël Marín for OpenType font conversion.
// Teus Hagen for several suggestions and fixes.
// Yukihiro Nakadaira for CID-0 CJK fonts fixes.
// Kosmas Papachristos for some CSS improvements.
// Marcel Partap for some fixes.
// Won Kyu Park for several suggestions, fixes and patches.
// Dominik Dzienia for QR-code support.
// Laurent Minguet for some suggestions.
// Christian Deligant for some suggestions and fixes.
// Anyone that has reported a bug or sent a suggestion.
//============================================================+

/**
 * This is a PHP class for generating PDF documents without requiring external extensions.<br>
 * TCPDF project (http://www.tcpdf.org) was originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
 * <h3>TCPDF main features are:</h3>
 * <ul>
 * <li>no external libraries are required for the basic functions;</li>
 * <li>all standard page formats, custom page formats, custom margins and units of measure;</li>
 * <li>UTF-8 Unicode and Right-To-Left languages;</li>
 * <li>TrueTypeUnicode, OpenTypeUnicode, TrueType, OpenType, Type1 and CID-0 fonts;</li>
 * <li>font subsetting;</li>
 * <li>methods to publish some XHTML + CSS code, Javascript and Forms;</li>
 * <li>images, graphic (geometric figures) and transformation methods;
 * <li>supports JPEG, PNG and SVG images natively, all images supported by GD (GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM) and all images supported via ImagMagick (http://www.imagemagick.org/www/formats.html)</li>
 * <li>1D and 2D barcodes: CODE 39, ANSI MH10.8M-1983, USD-3, 3 of 9, CODE 93, USS-93, Standard 2 of 5, Interleaved 2 of 5, CODE 128 A/B/C, 2 and 5 Digits UPC-Based Extention, EAN 8, EAN 13, UPC-A, UPC-E, MSI, POSTNET, PLANET, RMS4CC (Royal Mail 4-state Customer Code), CBC (Customer Bar Code), KIX (Klant index - Customer index), Intelligent Mail Barcode, Onecode, USPS-B-3200, CODABAR, CODE 11, PHARMACODE, PHARMACODE TWO-TRACKS, QR-Code, PDF417;</li>
 * <li>Grayscale, RGB, CMYK, Spot Colors and Transparencies;</li>
 * <li>automatic page header and footer management;</li>
 * <li>document encryption up to 256 bit and digital signature certifications;</li>
 * <li>transactions to UNDO commands;</li>
 * <li>PDF annotations, including links, text and file attachments;</li>
 * <li>text rendering modes (fill, stroke and clipping);</li>
 * <li>multiple columns mode;</li>
 * <li>no-write page regions;</li>
 * <li>bookmarks and table of content;</li>
 * <li>text hyphenation;</li>
 * <li>text stretching and spacing (tracking/kerning);</li>
 * <li>automatic page break, line break and text alignments including justification;</li>
 * <li>automatic page numbering and page groups;</li>
 * <li>move and delete pages;</li>
 * <li>page compression (requires php-zlib extension);</li>
 * <li>XOBject Templates;</li>
 * </ul>
 * Tools to encode your unicode fonts are on fonts/utils directory.</p>
 * @package com.tecnick.tcpdf
 * @abstract Class for generating PDF files on-the-fly without requiring external extensions.
 * @author Nicola Asuni
 * @copyright 2002-2010 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 * @link http://www.tcpdf.org
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 * @version 5.9.009
 */

/**
 * main configuration file
 * (define the K_TCPDF_EXTERNAL_CONFIG constant to skip this file)
 */
require_once(dirname(__FILE__).'/config/tcpdf_config.php');

/**
 * define default PDF document producer
 */
define('PDF_PRODUCER', 'TCPDF 5.9.009 (http://www.tcpdf.org)');

/**
* This is a PHP class for generating PDF documents without requiring external extensions.<br>
* TCPDF project (http://www.tcpdf.org) has been originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
* @name TCPDF
* @package com.tecnick.tcpdf
* @version 5.9.009
* @author Nicola Asuni - info@tecnick.com
* @link http://www.tcpdf.org
* @license http://www.gnu.org/copyleft/lesser.html LGPL
*/
class TCPDF {

	// Protected properties

	/**
	 * @var current page number
	 * @access protected
	 */
	protected $page;

	/**
	 * @var current object number
	 * @access protected
	 */
	protected $n;

	/**
	 * @var array of object offsets
	 * @access protected
	 */
	protected $offsets;

	/**
	 * @var buffer holding in-memory PDF
	 * @access protected
	 */
	protected $buffer;

	/**
	 * @var array containing pages
	 * @access protected
	 */
	protected $pages = array();

	/**
	 * @var current document state
	 * @access protected
	 */
	protected $state;

	/**
	 * @var compression flag
	 * @access protected
	 */
	protected $compress;

	/**
	 * @var current page orientation (P = Portrait, L = Landscape)
	 * @access protected
	 */
	protected $CurOrientation;

	/**
	 * @var Page dimensions
	 * @access protected
	 */
	protected $pagedim = array();

	/**
	 * @var scale factor (number of points in user unit)
	 * @access protected
	 */
	protected $k;

	/**
	 * @var width of page format in points
	 * @access protected
	 */
	protected $fwPt;

	/**
	 * @var height of page format in points
	 * @access protected
	 */
	protected $fhPt;

	/**
	 * @var current width of page in points
	 * @access protected
	 */
	protected $wPt;

	/**
	 * @var current height of page in points
	 * @access protected
	 */
	protected $hPt;

	/**
	 * @var current width of page in user unit
	 * @access protected
	 */
	protected $w;

	/**
	 * @var current height of page in user unit
	 * @access protected
	 */
	protected $h;

	/**
	 * @var left margin
	 * @access protected
	 */
	protected $lMargin;

	/**
	 * @var top margin
	 * @access protected
	 */
	protected $tMargin;

	/**
	 * @var right margin
	 * @access protected
	 */
	protected $rMargin;

	/**
	 * @var page break margin
	 * @access protected
	 */
	protected $bMargin;

	/**
	 * @var array of cell internal paddings ('T' => top, 'R' => right, 'B' => bottom, 'L' => left)
	 * @since 5.9.000 (2010-10-03)
	 * @access protected
	 */
	protected $cell_padding = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);

	/**
	 * @var array of cell margins ('T' => top, 'R' => right, 'B' => bottom, 'L' => left)
	 * @since 5.9.000 (2010-10-04)
	 * @access protected
	 */
	protected $cell_margin = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);

	/**
	 * @var current horizontal position in user unit for cell positioning
	 * @access protected
	 */
	protected $x;

	/**
	 * @var current vertical position in user unit for cell positioning
	 * @access protected
	 */
	protected $y;

	/**
	 * @var height of last cell printed
	 * @access protected
	 */
	protected $lasth;

	/**
	 * @var line width in user unit
	 * @access protected
	 */
	protected $LineWidth;

	/**
	 * @var array of standard font names
	 * @access protected
	 */
	protected $CoreFonts;

	/**
	 * @var array of used fonts
	 * @access protected
	 */
	protected $fonts = array();

	/**
	 * @var array of font files
	 * @access protected
	 */
	protected $FontFiles = array();

	/**
	 * @var array of encoding differences
	 * @access protected
	 */
	protected $diffs = array();

	/**
	 * @var array of used images
	 * @access protected
	 */
	protected $images = array();

	/**
	 * @var array of Annotations in pages
	 * @access protected
	 */
	protected $PageAnnots = array();

	/**
	 * @var array of internal links
	 * @access protected
	 */
	protected $links = array();

	/**
	 * @var current font family
	 * @access protected
	 */
	protected $FontFamily;

	/**
	 * @var current font style
	 * @access protected
	 */
	protected $FontStyle;

	/**
	 * @var current font ascent (distance between font top and baseline)
	 * @access protected
	 * @since 2.8.000 (2007-03-29)
	 */
	protected $FontAscent;

	/**
	 * @var current font descent (distance between font bottom and baseline)
	 * @access protected
	 * @since 2.8.000 (2007-03-29)
	 */
	protected $FontDescent;

	/**
	 * @var underlining flag
	 * @access protected
	 */
	protected $underline;

	/**
	 * @var overlining flag
	 * @access protected
	 */
	protected $overline;

	/**
	 * @var current font info
	 * @access protected
	 */
	protected $CurrentFont;

	/**
	 * @var current font size in points
	 * @access protected
	 */
	protected $FontSizePt;

	/**
	 * @var current font size in user unit
	 * @access protected
	 */
	protected $FontSize;

	/**
	 * @var commands for drawing color
	 * @access protected
	 */
	protected $DrawColor;

	/**
	 * @var commands for filling color
	 * @access protected
	 */
	protected $FillColor;

	/**
	 * @var commands for text color
	 * @access protected
	 */
	protected $TextColor;

	/**
	 * @var indicates whether fill and text colors are different
	 * @access protected
	 */
	protected $ColorFlag;

	/**
	 * @var automatic page breaking
	 * @access protected
	 */
	protected $AutoPageBreak;

	/**
	 * @var threshold used to trigger page breaks
	 * @access protected
	 */
	protected $PageBreakTrigger;

	/**
	 * @var flag set when processing footer
	 * @access protected
	 */
	protected $InFooter = false;

	/**
	 * @var zoom display mode
	 * @access protected
	 */
	protected $ZoomMode;

	/**
	 * @var layout display mode
	 * @access protected
	 */
	protected $LayoutMode;

	/**
	 * @var title
	 * @access protected
	 */
	protected $title = '';

	/**
	 * @var subject
	 * @access protected
	 */
	protected $subject = '';

	/**
	 * @var author
	 * @access protected
	 */
	protected $author = '';

	/**
	 * @var keywords
	 * @access protected
	 */
	protected $keywords = '';

	/**
	 * @var creator
	 * @access protected
	 */
	protected $creator = '';

	/**
	 * @var alias for total number of pages
	 * @access protected
	 */
	protected $AliasNbPages = '{nb}';

	/**
	 * @var alias for page number
	 * @access protected
	 */
	protected $AliasNumPage = '{pnb}';

	/**
	 * @var right-bottom corner X coordinate of inserted image
	 * @since 2002-07-31
	 * @author Nicola Asuni
	 * @access protected
	 */
	protected $img_rb_x;

	/**
	 * @var right-bottom corner Y coordinate of inserted image
	 * @since 2002-07-31
	 * @author Nicola Asuni
	 * @access protected
	 */
	protected $img_rb_y;

	/**
	 * @var adjusting factor to convert pixels to user units.
	 * @since 2004-06-14
	 * @author Nicola Asuni
	 * @access protected
	 */
	protected $imgscale = 1;

	/**
	 * @var boolean set to true when the input text is unicode (require unicode fonts)
	 * @since 2005-01-02
	 * @author Nicola Asuni
	 * @access protected
	 */
	protected $isunicode = false;

	/**
	 * @var object containing unicode data
	 * @since 5.9.004 (2010-10-18)
	 * @author Nicola Asuni
	 * @access protected
	 */
	protected $unicode;

	/**
	 * @var PDF version
	 * @since 1.5.3
	 * @access protected
	 */
	protected $PDFVersion = '1.7';

	/**
	 * @var Minimum distance between header and top page margin.
	 * @access protected
	 */
	protected $header_margin;

	/**
	 * @var Minimum distance between footer and bottom page margin.
	 * @access protected
	 */
	protected $footer_margin;

	/**
	 * @var original left margin value
	 * @access protected
	 * @since 1.53.0.TC013
	 */
	protected $original_lMargin;

	/**
	 * @var original right margin value
	 * @access protected
	 * @since 1.53.0.TC013
	 */
	protected $original_rMargin;

	/**
	 * @var Header font.
	 * @access protected
	 */
	protected $header_font;

	/**
	 * @var Footer font.
	 * @access protected
	 */
	protected $footer_font;

	/**
	 * @var Language templates.
	 * @access protected
	 */
	protected $l;

	/**
	 * @var Barcode to print on page footer (only if set).
	 * @access protected
	 */
	protected $barcode = false;

	/**
	 * @var If true prints header
	 * @access protected
	 */
	protected $print_header = true;

	/**
	 * @var If true prints footer.
	 * @access protected
	 */
	protected $print_footer = true;

	/**
	 * @var Header image logo.
	 * @access protected
	 */
	protected $header_logo = '';

	/**
	 * @var Header image logo width in mm.
	 * @access protected
	 */
	protected $header_logo_width = 30;

	/**
	 * @var String to print as title on document header.
	 * @access protected
	 */
	protected $header_title = '';

	/**
	 * @var String to print on document header.
	 * @access protected
	 */
	protected $header_string = '';

	/**
	 * @var Default number of columns for html table.
	 * @access protected
	 */
	protected $default_table_columns = 4;

	// variables for html parser

	/**
	 * @var HTML PARSER: array to store current link and rendering styles.
	 * @access protected
	 */
	protected $HREF = array();

	/**
	 * @var store a list of available fonts on filesystem.
	 * @access protected
	 */
	protected $fontlist = array();

	/**
	 * @var current foreground color
	 * @access protected
	 */
	protected $fgcolor;

	/**
	 * @var HTML PARSER: array of boolean values, true in case of ordered list (OL), false otherwise.
	 * @access protected
	 */
	protected $listordered = array();

	/**
	 * @var HTML PARSER: array count list items on nested lists.
	 * @access protected
	 */
	protected $listcount = array();

	/**
	 * @var HTML PARSER: current list nesting level.
	 * @access protected
	 */
	protected $listnum = 0;

	/**
	 * @var HTML PARSER: indent amount for lists.
	 * @access protected
	 */
	protected $listindent = 0;

	/**
	 * @var HTML PARSER: current list indententation level.
	 * @access protected
	 */
	protected $listindentlevel = 0;

	/**
	 * @var current background color
	 * @access protected
	 */
	protected $bgcolor;

	/**
	 * @var Store temporary font size in points.
	 * @access protected
	 */
	protected $tempfontsize = 10;

	/**
	 * @var spacer for LI tags.
	 * @access protected
	 */
	protected $lispacer = '';

	/**
	 * @var default encoding
	 * @access protected
	 * @since 1.53.0.TC010
	 */
	protected $encoding = 'UTF-8';

	/**
	 * @var PHP internal encoding
	 * @access protected
	 * @since 1.53.0.TC016
	 */
	protected $internal_encoding;

	/**
	 * @var indicates if the document language is Right-To-Left
	 * @access protected
	 * @since 2.0.000
	 */
	protected $rtl = false;

	/**
	 * @var used to force RTL or LTR string inversion
	 * @access protected
	 * @since 2.0.000
	 */
	protected $tmprtl = false;

	// --- Variables used for document encryption:

	/**
	 * Indicates whether document is protected
	 * @access protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $encrypted;

	/**
	 * Array containing encryption settings
	 * @access protected
	 * @since 5.0.005 (2010-05-11)
	 */
	protected $encryptdata = array();

	/**
	 * last RC4 key encrypted (cached for optimisation)
	 * @access protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $last_enc_key;

	/**
	 * last RC4 computed key
	 * @access protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $last_enc_key_c;

	/**
	 * Encryption padding
	 * @access protected
	 */
	protected $enc_padding = "\x28\xBF\x4E\x5E\x4E\x75\x8A\x41\x64\x00\x4E\x56\xFF\xFA\x01\x08\x2E\x2E\x00\xB6\xD0\x68\x3E\x80\x2F\x0C\xA9\xFE\x64\x53\x69\x7A";

	/**
	 * File ID (used on trailer)
	 * @access protected
	 * @since 5.0.005 (2010-05-12)
	 */
	protected $file_id;

	// --- bookmark ---

	/**
	 * Outlines for bookmark
	 * @access protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $outlines = array();

	/**
	 * Outline root for bookmark
	 * @access protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $OutlineRoot;

	// --- javascript and form ---

	/**
	 * javascript code
	 * @access protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $javascript = '';

	/**
	 * javascript counter
	 * @access protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $n_js;

	/**
	 * line trough state
	 * @access protected
	 * @since 2.8.000 (2008-03-19)
	 */
	protected $linethrough;

	/**
	 * Array with additional document-wide usage rights for the document.
	 * @access protected
	 * @since 5.8.014 (2010-08-23)
	 */
	protected $ur = array();

	/**
	 * Dot Per Inch Document Resolution (do not change)
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $dpi = 72;

	/**
	 * Array of page numbers were a new page group was started
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $newpagegroup = array();

	/**
	 * Contains the number of pages of the groups
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $pagegroups;

	/**
	 * Contains the alias of the current page group
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $currpagegroup;

	/**
	 * Restrict the rendering of some elements to screen or printout.
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $visibility = 'all';

	/**
	 * Print visibility.
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $n_ocg_print;

	/**
	 * View visibility.
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $n_ocg_view;

	/**
	 * Array of transparency objects and parameters.
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $extgstates;

	/**
	 * Set the default JPEG compression quality (1-100)
	 * @access protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $jpeg_quality;

	/**
	 * Default cell height ratio.
	 * @access protected
	 * @since 3.0.014 (2008-05-23)
	 */
	protected $cell_height_ratio = K_CELL_HEIGHT_RATIO;

	/**
	 * PDF viewer preferences.
	 * @access protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $viewer_preferences;

	/**
	 * A name object specifying how the document should be displayed when opened.
	 * @access protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $PageMode;

	/**
	 * Array for storing gradient information.
	 * @access protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $gradients = array();

	/**
	 * Array used to store positions inside the pages buffer.
	 * keys are the page numbers
	 * @access protected
	 * @since 3.2.000 (2008-06-26)
	 */
	protected $intmrk = array();

	/**
	 * Array used to store positions inside the pages buffer.
	 * keys are the page numbers
	 * @access protected
	 * @since 5.7.000 (2010-08-03)
	 */
	protected $bordermrk = array();

	/**
	 * Array used to store page positions to track empty pages.
	 * keys are the page numbers
	 * @access protected
	 * @since 5.8.007 (2010-08-18)
	 */
	protected $emptypagemrk = array();

	/**
	 * Array used to store content positions inside the pages buffer.
	 * keys are the page numbers
	 * @access protected
	 * @since 4.6.021 (2009-07-20)
	 */
	protected $cntmrk = array();

	/**
	 * Array used to store footer positions of each page.
	 * @access protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $footerpos = array();

	/**
	 * Array used to store footer length of each page.
	 * @access protected
	 * @since 4.0.014 (2008-07-29)
	 */
	protected $footerlen = array();

	/**
	 * True if a newline is created.
	 * @access protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $newline = true;

	/**
	 * End position of the latest inserted line
	 * @access protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $endlinex = 0;

	/**
	 * PDF string for last line width
	 * @access protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleWidth = '';

	/**
	 * PDF string for last line width
	 * @access protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleCap = '0 J';

	/**
	 * PDF string for last line width
	 * @access protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleJoin = '0 j';

	/**
	 * PDF string for last line width
	 * @access protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleDash = '[] 0 d';

	/**
	 * True if marked-content sequence is open
	 * @access protected
	 * @since 4.0.013 (2008-07-28)
	 */
	protected $openMarkedContent = false;

	/**
	 * Count the latest inserted vertical spaces on HTML
	 * @access protected
	 * @since 4.0.021 (2008-08-24)
	 */
	protected $htmlvspace = 0;

	/**
	 * Array of Spot colors
	 * @access protected
	 * @since 4.0.024 (2008-09-12)
	 */
	protected $spot_colors = array();

	/**
	 * Symbol used for HTML unordered list items
	 * @access protected
	 * @since 4.0.028 (2008-09-26)
	 */
	protected $lisymbol = '';

	/**
	 * String used to mark the beginning and end of EPS image blocks
	 * @access protected
	 * @since 4.1.000 (2008-10-18)
	 */
	protected $epsmarker = 'x#!#EPS#!#x';

	/**
	 * Array of transformation matrix
	 * @access protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $transfmatrix = array();

	/**
	 * Current key for transformation matrix
	 * @access protected
	 * @since 4.8.005 (2009-09-17)
	 */
	protected $transfmatrix_key = 0;

	/**
	 * Booklet mode for double-sided pages
	 * @access protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $booklet = false;

	/**
	 * Epsilon value used for float calculations
	 * @access protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $feps = 0.005;

	/**
	 * Array used for custom vertical spaces for HTML tags
	 * @access protected
	 * @since 4.2.001 (2008-10-30)
	 */
	protected $tagvspaces = array();

	/**
	 * @var HTML PARSER: custom indent amount for lists.
	 * Negative value means disabled.
	 * @access protected
	 * @since 4.2.007 (2008-11-12)
	 */
	protected $customlistindent = -1;

	/**
	 * @var if true keeps the border open for the cell sides that cross the page.
	 * @access protected
	 * @since 4.2.010 (2008-11-14)
	 */
	protected $opencell = true;

	/**
	 * @var array of files to embedd
	 * @access protected
	 * @since 4.4.000 (2008-12-07)
	 */
	protected $embeddedfiles = array();

	/**
	 * @var boolean true when inside html pre tag
	 * @access protected
	 * @since 4.4.001 (2008-12-08)
	 */
	protected $premode = false;

	/**
	 * Array used to store positions of graphics transformation blocks inside the page buffer.
	 * keys are the page numbers
	 * @access protected
	 * @since 4.4.002 (2008-12-09)
	 */
	protected $transfmrk = array();

	/**
	 * Default color for html links
	 * @access protected
	 * @since 4.4.003 (2008-12-09)
	 */
	protected $htmlLinkColorArray = array(0, 0, 255);

	/**
	 * Default font style to add to html links
	 * @access protected
	 * @since 4.4.003 (2008-12-09)
	 */
	protected $htmlLinkFontStyle = 'U';

	/**
	 * Counts the number of pages.
	 * @access protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $numpages = 0;

	/**
	 * Array containing page lengths in bytes.
	 * @access protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $pagelen = array();

	/**
	 * Counts the number of pages.
	 * @access protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $numimages = 0;

	/**
	 * Store the image keys.
	 * @access protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $imagekeys = array();

	/**
	 * Length of the buffer in bytes.
	 * @access protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $bufferlen = 0;

	/**
	 * If true enables disk caching.
	 * @access protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $diskcache = false;

	/**
	 * Counts the number of fonts.
	 * @access protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $numfonts = 0;

	/**
	 * Store the font keys.
	 * @access protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $fontkeys = array();

	/**
	 * Store the font object IDs.
	 * @access protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $font_obj_ids = array();

	/**
	 * Store the fage status (true when opened, false when closed).
	 * @access protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $pageopen = array();

	/**
	 * Default monospaced font
	 * @access protected
	 * @since 4.5.025 (2009-03-10)
	 */
	protected $default_monospaced_font = 'courier';

	/**
	 * Used to store a cloned copy of the current class object
	 * @access protected
	 * @since 4.5.029 (2009-03-19)
	 */
	protected $objcopy;

	/**
	 * Array used to store the lengths of cache files
	 * @access protected
	 * @since 4.5.029 (2009-03-19)
	 */
	protected $cache_file_length = array();

	/**
	 * Table header content to be repeated on each new page
	 * @access protected
	 * @since 4.5.030 (2009-03-20)
	 */
	protected $thead = '';

	/**
	 * Margins used for table header.
	 * @access protected
	 * @since 4.5.030 (2009-03-20)
	 */
	protected $theadMargins = array();

	/**
	 * Cache array for UTF8StringToArray() method.
	 * @access protected
	 * @since 4.5.037 (2009-04-07)
	 */
	protected $cache_UTF8StringToArray = array();

	/**
	 * Maximum size of cache array used for UTF8StringToArray() method.
	 * @access protected
	 * @since 4.5.037 (2009-04-07)
	 */
	protected $cache_maxsize_UTF8StringToArray = 8;

	/**
	 * Current size of cache array used for UTF8StringToArray() method.
	 * @access protected
	 * @since 4.5.037 (2009-04-07)
	 */
	protected $cache_size_UTF8StringToArray = 0;

	/**
	 * If true enables document signing
	 * @access protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $sign = false;

	/**
	 * Signature data
	 * @access protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $signature_data = array();

	/**
	 * Signature max length
	 * @access protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $signature_max_length = 11742;

	/**
	 * data for signature appearance
	 * @access protected
	 * @since 5.3.011 (2010-06-16)
	 */
	protected $signature_appearance = array('page' => 1, 'rect' => '0 0 0 0');

	/**
	 * Regular expression used to find blank characters used for word-wrapping.
	 * @access protected
	 * @since 4.6.006 (2009-04-28)
	 */
	protected $re_spaces = '/[^\S\xa0]/';

	/**
	 * Array of parts $re_spaces
	 * @access protected
	 * @since 5.5.011 (2010-07-09)
	 */
	protected $re_space = array('p' => '[^\S\xa0]', 'm' => '');

	/**
	 * Signature object ID
	 * @access protected
	 * @since 4.6.022 (2009-06-23)
	 */
	protected $sig_obj_id = 0;

	/**
	 * ByteRange placemark used during signature process.
	 * @access protected
	 * @since 4.6.028 (2009-08-25)
	 */
	protected $byterange_string = '/ByteRange[0 ********** ********** **********]';

	/**
	 * Placemark used during signature process.
	 * @access protected
	 * @since 4.6.028 (2009-08-25)
	 */
	protected $sig_annot_ref = '***SIGANNREF*** 0 R';

	/**
	 * ID of page objects
	 * @access protected
	 * @since 4.7.000 (2009-08-29)
	 */
	protected $page_obj_id = array();

	/**
	 * List of form annotations IDs
	 * @access protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_obj_id = array();

	/**
	 * Deafult Javascript field properties. Possible values are described on official Javascript for Acrobat API reference. Annotation options can be directly specified using the 'aopt' entry.
	 * @access protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $default_form_prop = array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 255), 'strokeColor'=>array(128, 128, 128));

	/**
	 * Javascript objects array
	 * @access protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $js_objects = array();

	/**
	 * Current form action (used during XHTML rendering)
	 * @access protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_action = '';

	/**
	 * Current form encryption type (used during XHTML rendering)
	 * @access protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_enctype = 'application/x-www-form-urlencoded';

	/**
	 * Current method to submit forms.
	 * @access protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_mode = 'post';

	/**
	 * List of fonts used on form fields (fontname => fontkey).
	 * @access protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $annotation_fonts = array();

	/**
	 * List of radio buttons parent objects.
	 * @access protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $radiobutton_groups = array();

	/**
	 * List of radio group objects IDs
	 * @access protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $radio_groups = array();

	/**
	 * Text indentation value (used for text-indent CSS attribute)
	 * @access protected
	 * @since 4.8.006 (2009-09-23)
	 */
	protected $textindent = 0;

	/**
	 * Store page number when startTransaction() is called.
	 * @access protected
	 * @since 4.8.006 (2009-09-23)
	 */
	protected $start_transaction_page = 0;

	/**
	 * Store Y position when startTransaction() is called.
	 * @access protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $start_transaction_y = 0;

	/**
	 * True when we are printing the thead section on a new page
	 * @access protected
	 * @since 4.8.027 (2010-01-25)
	 */
	protected $inthead = false;

	/**
	 * Array of column measures (width, space, starting Y position)
	 * @access protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $columns = array();

	/**
	 * Number of colums
	 * @access protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $num_columns = 1;

	/**
	 * Current column number
	 * @access protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $current_column = 0;

	/**
	 * Starting page for columns
	 * @access protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $column_start_page = 0;

	/**
	 * Maximum page and column selected
	 * @access protected
	 * @since 5.8.000 (2010-08-11)
	 */
	protected $maxselcol = array('page' => 0, 'column' => 0);

	/**
	 * Array of: X difference between table cell x start and starting page margin, cellspacing, cellpadding
	 * @access protected
	 * @since 5.8.000 (2010-08-11)
	 */
	protected $colxshift = array('x' => 0, 's' => 0, 'p' => 0);

	/**
	 * Text rendering mode: 0 = Fill text; 1 = Stroke text; 2 = Fill, then stroke text; 3 = Neither fill nor stroke text (invisible); 4 = Fill text and add to path for clipping; 5 = Stroke text and add to path for clipping; 6 = Fill, then stroke text and add to path for clipping; 7 = Add text to path for clipping.
	 * @access protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $textrendermode = 0;

	/**
	 * Text stroke width in doc units
	 * @access protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $textstrokewidth = 0;

	/**
	 * @var current stroke color
	 * @access protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $strokecolor;

	/**
	 * @var default unit of measure for document
	 * @access protected
	 * @since 5.0.000 (2010-04-22)
	 */
	protected $pdfunit = 'mm';

	/**
	 * @var true when we are on TOC (Table Of Content) page
	 * @access protected
	 */
	protected $tocpage = false;

	/**
	 * @var If true convert vector images (SVG, EPS) to raster image using GD or ImageMagick library.
	 * @access protected
	 * @since 5.0.000 (2010-04-26)
	 */
	protected $rasterize_vector_images = false;

	/**
	 * @var If true enables font subsetting by default
	 * @access protected
	 * @since 5.3.002 (2010-06-07)
	 */
	protected $font_subsetting = true;

	/**
	 * @var Array of default graphic settings
	 * @access protected
	 * @since 5.5.008 (2010-07-02)
	 */
	protected $default_graphic_vars = array();

	/**
	 * @var Array of XObjects
	 * @access protected
	 * @since 5.8.014 (2010-08-23)
	 */
	protected $xobjects = array();

	/**
	 * @var boolean true when we are inside an XObject
	 * @access protected
	 * @since 5.8.017 (2010-08-24)
	 */
	protected $inxobj = false;

	/**
	 * @var current XObject ID
	 * @access protected
	 * @since 5.8.017 (2010-08-24)
	 */
	protected $xobjid = '';

	/**
	 * @var percentage of character stretching
	 * @access protected
	 * @since 5.9.000 (2010-09-29)
	 */
	protected $font_stretching = 100;

	/**
	 * @var increases or decreases the space between characters in a text by the specified amount (tracking/kerning).
	 * @access protected
	 * @since 5.9.000 (2010-09-29)
	 */
	protected $font_spacing = 0;

	/**
	 * @var array of no-write regions
	 * ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right)
	 * @access protected
	 * @since 5.9.003 (2010-10-14)
	 */
	protected $page_regions = array();

	/**
	 * @var array containing HTML color names and values
	 * @access protected
	 * @since 5.9.004 (2010-10-18)
	 */
	protected $webcolor = array();

	/**
	 * @var directory used for the last SVG image
	 * @access protected
	 * @since 5.0.000 (2010-05-05)
	 */
	protected $svgdir = '';

	/**
	 * @var Deafult unit of measure for SVG
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgunit = 'px';

	/**
	 * @var array of SVG gradients
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svggradients = array();

	/**
	 * @var ID of last SVG gradient
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svggradientid = 0;

	/**
	 * @var true when in SVG defs group
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgdefsmode = false;

	/**
	 * @var array of SVG defs
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgdefs = array();

	/**
	 * @var true when in SVG clipPath tag
	 * @access protected
	 * @since 5.0.000 (2010-04-26)
	 */
	protected $svgclipmode = false;

	/**
	 * @var array of SVG clipPath commands
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgclippaths = array();

	/**
	 * @var array of SVG clipPath tranformation matrix
	 * @access protected
	 * @since 5.8.022 (2010-08-31)
	 */
	protected $svgcliptm = array();

	/**
	 * @var ID of last SVG clipPath
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgclipid = 0;

	/**
	 * @var svg text
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgtext = '';

	/**
	 * @var svg text properties
	 * @access protected
	 * @since 5.8.013 (2010-08-23)
	 */
	protected $svgtextmode = array();

	/**
	 * @var array of hinheritable SVG properties
	 * @access protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svginheritprop = array('clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cursor', 'direction', 'fill', 'fill-opacity', 'fill-rule', 'font', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'glyph-orientation-horizontal', 'glyph-orientation-vertical', 'image-rendering', 'kerning', 'letter-spacing', 'marker', 'marker-end', 'marker-mid', 'marker-start', 'pointer-events', 'shape-re