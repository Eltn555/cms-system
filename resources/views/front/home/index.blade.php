@extends('front.master')
@section('content')
    <!-- HEADING HIDDEN SEO -->
    <h1 class="sr-only">Alamp - Interior Decor and Lights Responsive Shopify Theme</h1>
    <div class="search-full-destop">
        <div class="search-eveland js-box-search">
            <div class="drawer-search-top">
                <h3 class="drawer-search-title">Start typing and hit Enter</h3>
            </div>
            <form class="wg-search-form" action="https://alamp-store-demo.myshopify.com/search">
                <input type="hidden" name="type" value="product">
                <input type="text" name="q" placeholder="Search anything" class="search-input js_engo_autocomplate">
                <button type="submit" class="set-20-svg">

                    <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" height="400" width="400" id="svg2"
                         version="1.1" xmlns:dc="http://purl.org/dc/elements/1.1/"
                         xmlns:cc="http://creativecommons.org/ns#"
                         xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                         xml:space="preserve"><metadata id="metadata8">
                            <rdf>
                                <work rdf:about="">
                                    <format>image/svg+xml</format>
                                    <type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                </work>
                            </rdf>
                        </metadata>
                        <defs id="defs6"></defs>
                        <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10">
                            <g transform="scale(0.1)" id="g12">
                                <path id="path14" style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                      d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                            </g>
                        </g></svg>
                </button>
            </form>
            <div class="drawer_back">
                <a href="javascript:void(0)" class="close-search js-drawer-close set-16-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         id="Capa_1" x="0px" y="0px" viewBox="0 0 298.667 298.667"
                         style="enable-background:new 0 0 298.667 298.667;" xml:space="preserve">
          <g>
              <g>
                  <polygon
                      points="298.667,30.187 268.48,0 149.333,119.147 30.187,0 0,30.187 119.147,149.333 0,268.48 30.187,298.667     149.333,179.52 268.48,298.667 298.667,268.48 179.52,149.333   "></polygon>
              </g>
          </g>

        </svg>
                </a>
            </div>

            <div class="result_prod js_productSearchResults">
                <div class="js_search_results row">

                </div>
            </div>

        </div>
        <div class="bg_search_box">
        </div>
    </div>
    <div class="js-minicart minicart">
        <div class="relative" style="height: 100%;">
            <div class="mini-content ">
                <div class="mini-cart-head">
                    <a href="javascript:void(0)" class="mini-cart-undo close-mini-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="Capa_1" x="0px" y="0px" viewBox="0 0 298.667 298.667"
                             style="enable-background:new 0 0 298.667 298.667;" xml:space="preserve">
            <g>
                <g>
                    <polygon
                        points="298.667,30.187 268.48,0 149.333,119.147 30.187,0 0,30.187 119.147,149.333 0,268.48 30.187,298.667     149.333,179.52 268.48,298.667 298.667,268.48 179.52,149.333   "></polygon>
                </g>
            </g>

          </svg>
                    </a>
                    <h3 class="title">Shopping Cart</h3>
                    <div class="mini-cart-counter"><span class="cart-counter enj-cartcount">0</span></div>
                </div>

                <div class="mini-cart-bottom enj-minicart-ajax">

                    <div class="list_product_minicart empty">
                        <div class="empty-product_minicart">
                            <p class="mb-0">Your shopping bag is empty</p>
                            <a href="collections/all.html" class="to-cart">Go to the shop</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="js-bg bg-minicart"></div>
    <div class="menu_moblie d-flex d-xl-none jsmenumobile align-items-center menu_mobilescroll" style="">
        <a href="javascript:void(0)" title="" class="menuleft">
    <span class="iconmenu">
      <span></span>
      <span></span>
      <span></span>
    </span>
        </a>
        <div class="logo_menumoblie">


            <a href="index.html">

                <img src="cdn/shop/files/logo8579.png?v=1613770768" width="115" alt="logo">

            </a>


        </div>
        <div class="menuright">
            <span class="pr-3 js-search-destop"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400"
                                                     height="400" width="400" id="svg2" version="1.1"
                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                     xmlns:svg="http://www.w3.org/2000/svg" xml:space="preserve"><metadata
                        id="metadata8"><rdf><work rdf:about=""><format>image/svg+xml</format><type
                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type></work></rdf></metadata><defs
                        id="defs6"></defs><g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10"><g
                            transform="scale(0.1)" id="g12"><path id="path14"
                                                                  style="fill:#231f20;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                  d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path></g></g></svg></span>
            <a href="javascript:void(0)" title="" class="js-call-minicart">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" height="400" width="400" id="svg2"
                     version="1.1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#"
                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                     xml:space="preserve"><metadata id="metadata8">
                        <rdf>
                            <work rdf:about="">
                                <format>image/svg+xml</format>
                                <type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                            </work>
                        </rdf>
                    </metadata>
                    <defs id="defs6"></defs>
                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10">
                        <g transform="scale(0.1)" id="g12">
                            <path id="path14" style="fill:#231f20;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                  d="M 2565.21,2412.71 H 450.992 V 0 H 2565.21 V 2412.71 Z M 2366.79,2214.29 V 198.43 H 649.418 V 2214.29 H 2366.79"></path>
                            <path id="path16" style="fill:#231f20;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                  d="m 1508.11,2990 h -0.01 c -361.22,0 -654.037,-292.82 -654.037,-654.04 V 2216.92 H 2162.14 v 119.04 c 0,361.22 -292.82,654.04 -654.03,654.04 z m 0,-198.43 c 224.16,0 411.02,-162.7 448.69,-376.23 h -897.39 c 37.66,213.53 224.53,376.23 448.7,376.23"></path>
                            <path id="path18" style="fill:#231f20;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                  d="m 1946.24,1868.17 h -876.27 v 169.54 h 876.27 v -169.54"></path>
                        </g>
                    </g></svg>
                <span class="count_pr_incart enj-cartcount">0</span>
            </a>
        </div>
    </div>
    <div class="box_contentmenu_background"></div>
    <div class="box_contentmenu">
        <div class="tab_content_menu_mobile">
            <ul class="nav nav-tabs toptab_box_content list-unstyled mb-0" role="tablist">
                <li class="toptab_li">
                    <a class="tab_navar active" href="#tab_menu_mobile" role="tab" data-toggle="tab">
          <span class="tab-menu-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
                        <span class="ml-3">Menu</span>
                    </a>
                </li>
                <li class="toptab_li">
                    <a class="tab_navar_right" href="#tab_account_mobile" role="tab" data-toggle="tab">
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" height="400"
                                            width="400" id="svg2" version="1.1"
                                            xmlns:dc="http://purl.org/dc/elements/1.1/"
                                            xmlns:cc="http://creativecommons.org/ns#"
                                            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                            xmlns:svg="http://www.w3.org/2000/svg" xml:space="preserve"><metadata
                                    id="metadata8"><rdf><work rdf:about=""><format>image/svg+xml</format><type
                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type></work></rdf></metadata><defs
                                    id="defs6"></defs><g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10"><g
                                        transform="scale(0.1)" id="g12"><path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1506.87,2587.11 c -225.04,0 -408.14,-183.08 -408.14,-408.11 0,-225.06 183.1,-408.13 408.14,-408.13 225.02,0 408.13,183.07 408.13,408.13 0,225.03 -183.11,408.11 -408.13,408.11 z m 0,-1038.56 c -347.64,0 -630.432,282.79 -630.432,630.45 0,347.63 282.792,630.43 630.432,630.43 347.63,0 630.42,-282.8 630.42,-630.43 0,-347.66 -282.79,-630.45 -630.42,-630.45 v 0"></path><path
                                            id="path16" style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            d="M 399.648,361.789 H 2614.07 c -25.06,261.531 -139.49,503.461 -327.47,689.831 -124.25,123.14 -300.78,193.96 -483.86,193.96 h -591.76 c -183.61,0 -359.601,-70.82 -483.863,-193.96 C 539.148,865.25 424.719,623.32 399.648,361.789 Z M 2730.69,139.461 H 283.035 c -61.558,0 -111.16,49.59 -111.16,111.16 0,363.438 141.68,704 398.32,959.019 165.657,164.55 399.414,258.82 640.785,258.82 h 591.76 c 241.94,0 475.14,-94.27 640.8,-258.82 256.63,-255.019 398.31,-595.581 398.31,-959.019 0,-61.57 -49.59,-111.16 -111.16,-111.16 v 0"></path></g></g></svg></span>
                        <span class="ml-2"> Login</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane show in active tab_children_menu" id="tab_menu_mobile">


                    <div class="menu-horizon-list">


                        <a href="index.html" title="HOME" class="relative nammenu ">HOME</a>


                        <a data-check="c1" class="toggle-menumobile  js_icon_horizon-menu">
                            <i class=" fa fa-angle-right"></i>
                        </a>
                        <div class="c1 menu_lv2">

                            <a href="javascript:void(0)" title="HOME" class="js-back back-to"> HOME <i
                                    class="fa fa-angle-right pl-2 "></i> </a>


                            <h2 class="title_menu_mb title_only_one"><a
                                    href="index1056.html?preview_theme_id=104817066148">HOME 1</a></h2>


                            <h2 class="title_menu_mb title_only_one"><a
                                    href="index6ae9.html?preview_theme_id=105488646308">HOME 2</a></h2>


                            <h2 class="title_menu_mb title_only_one"><a
                                    href="indexf68e.html?preview_theme_id=105488711844">HOME 3</a></h2>


                            <h2 class="title_menu_mb title_only_one"><a
                                    href="indexc23b.html?preview_theme_id=105488744612">HOME 4</a></h2>


                            <h2 class="title_menu_mb title_only_one"><a
                                    href="indexb485.html?preview_theme_id=105488777380">HOME 5</a></h2>


                        </div>

                    </div>


                    <div class="menu-horizon-list">


                        <a href="index.html" title="SHOP" class="relative nammenu ">SHOP
                            <span class="absolute label_menu label_menu-shophot-e62e05-2"
                                  style="background-color: #e62e05;"><span>HOT</span></span>
                            <style>
                                .label_menu-shophot-e62e05-2:before {
                                    border-top: 4px solid #e62e05;
                                }
                            </style>
                        </a>


                        <a data-check="c2" class="toggle-menumobile  js_icon_horizon-menu">
                            <i class=" fa fa-angle-right"></i>
                        </a>
                        <div class="c2 menu_lv2">

                            <a href="javascript:void(0)" title="SHOP" class="js-back back-to"> SHOP <i
                                    class="fa fa-angle-right pl-2 "></i> </a>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="SHOP LAYOUTS " class="delay03 uppercase menu_lv1 "><span>SHOP LAYOUTS </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="collections/all/index1056.html?preview_theme_id=104817066148"
                                       title="Pagination " class="delay03 uppercase menu_lv1 "><span>Pagination </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index6ae9.html?preview_theme_id=105488646308"
                                       title="Ajax Load More" class="relative delay03 uppercase menu_lv1 "><span>Ajax Load More</span>
                                        <div class="absolute label_menu label_menu-ajax-load-morehot-e62e05-2"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-ajax-load-morehot-e62e05-2:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="collections/all/indexf68e.html?preview_theme_id=105488711844"
                                       title="List View "
                                       class="delay03 uppercase menu_lv1 "><span>List View </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index2bc1.html?preview_theme_id=104318861468"
                                       title="Background Mordern " class="delay03 uppercase menu_lv1 "><span>Background Mordern </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexb485.html?preview_theme_id=105488777380"
                                       title="Fullwidth Layouts " class="delay03 uppercase menu_lv1 "><span>Fullwidth Layouts </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index8820.html?preview_theme_id=105497854116"
                                       title="Sidebar Layouts " class="delay03 uppercase menu_lv1 "><span>Sidebar Layouts </span></a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="SHOP HEADING " class="delay03 uppercase menu_lv1 "><span>SHOP HEADING </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="collections/all/index9632.html?preview_theme_id=105497886884"
                                       title="Small Heading "
                                       class="delay03 uppercase menu_lv1 "><span>Small Heading </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexb50c.html?preview_theme_id=105497919652"
                                       title="Banner Heading" class="relative delay03 uppercase menu_lv1 "><span>Banner Heading</span>
                                        <div class="absolute label_menu label_menu-banner-headingnew-1ad441-2"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-banner-headingnew-1ad441-2:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="collections/all/index1056.html?preview_theme_id=104817066148"
                                       title="Dark Heading "
                                       class="delay03 uppercase menu_lv1 "><span>Dark Heading </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index6ae9.html?preview_theme_id=105488646308"
                                       title="Icon Category "
                                       class="delay03 uppercase menu_lv1 "><span>Icon Category </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexe521.html?preview_theme_id=105497952420"
                                       title="Mini Category "
                                       class="delay03 uppercase menu_lv1 "><span>Mini Category </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexb485.html?preview_theme_id=105488777380"
                                       title="Background " class="delay03 uppercase menu_lv1 "><span>Background </span></a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="FILTER LAYOUT " class="delay03 uppercase menu_lv1 "><span>FILTER LAYOUT </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="collections/all/indexb485.html?preview_theme_id=105488777380"
                                       title="Top Filter"
                                       class="relative delay03 uppercase menu_lv1 "><span>Top Filter</span>
                                        <div class="absolute label_menu label_menu-top-filternew-1ad441-1"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-top-filternew-1ad441-1:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="collections/all/index1056.html?preview_theme_id=104817066148"
                                       title="Drawer Filter"
                                       class="delay03 uppercase menu_lv1 "><span>Drawer Filter</span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index6ae9.html?preview_theme_id=105488646308"
                                       title="Off Canvas Filter " class="delay03 uppercase menu_lv1 "><span>Off Canvas Filter </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index2bc1.html?preview_theme_id=104318861468"
                                       title="Brand Filter "
                                       class="delay03 uppercase menu_lv1 "><span>Brand Filter </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index8820.html?preview_theme_id=105497854116"
                                       title="Sticky Filter "
                                       class="delay03 uppercase menu_lv1 "><span>Sticky Filter </span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexb50c.html?preview_theme_id=105497919652"
                                       title="Acordition Filter" class="relative delay03 uppercase menu_lv1 "><span>Acordition Filter</span>
                                        <div class="absolute label_menu label_menu-acordition-filterhot-e62e05-6"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-acordition-filterhot-e62e05-6:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="PRODUCT LAYOUTS " class="delay03 uppercase menu_lv1 "><span>PRODUCT LAYOUTS </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="products/cotton-novelty-pendant/index1056.html?preview_theme_id=104817066148"
                                       title="Vertical Thumbnail " class="delay03 uppercase menu_lv1 "><span>Vertical Thumbnail </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index6ae9.html?preview_theme_id=105488646308"
                                       title="Horizontal thumbnail " class="delay03 uppercase menu_lv1 "><span>Horizontal thumbnail </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/indexf68e.html?preview_theme_id=105488711844"
                                       title="Sticky Details "
                                       class="delay03 uppercase menu_lv1 "><span>Sticky Details </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index2bc1.html?preview_theme_id=104318861468"
                                       title="Sticky Center "
                                       class="delay03 uppercase menu_lv1 "><span>Sticky Center </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/indexb485.html?preview_theme_id=105488777380"
                                       title="With Background " class="delay03 uppercase menu_lv1 "><span>With Background </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index8820.html?preview_theme_id=105497854116"
                                       title="Gallery Basic "
                                       class="delay03 uppercase menu_lv1 "><span>Gallery Basic </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index9632.html?preview_theme_id=105497886884"
                                       title="Slider Large "
                                       class="delay03 uppercase menu_lv1 "><span>Slider Large </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/indexb50c.html?preview_theme_id=105497919652"
                                       title="  Slide Center "
                                       class="delay03 uppercase menu_lv1 "><span>  Slide Center </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index943f.html?preview_theme_id=105497985188"
                                       title="Extra Sidebar "
                                       class="delay03 uppercase menu_lv1 "><span>Extra Sidebar </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/indexe521.html?preview_theme_id=105497952420"
                                       title="Slide Gallery "
                                       class="delay03 uppercase menu_lv1 "><span>Slide Gallery </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index1059.html?preview_theme_id=105498017956"
                                       title="Gallery Modern "
                                       class="delay03 uppercase menu_lv1 "><span>Gallery Modern </span></a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="PRODUCT TYPES " class="delay03 uppercase menu_lv1 "><span>PRODUCT TYPES </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="products/armed-sconce/index1056.html?preview_theme_id=104817066148"
                                       title="Simple" class="relative delay03 uppercase menu_lv1 "><span>Simple</span>
                                        <div class="absolute label_menu label_menu-simplenew-1ad441-1"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-simplenew-1ad441-1:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/index1056.html?preview_theme_id=104817066148"
                                       title="Variable Color" class="relative delay03 uppercase menu_lv1 "><span>Variable Color</span>
                                        <div class="absolute label_menu label_menu-variable-colorhot-e62e05-2"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-variable-colorhot-e62e05-2:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="products/cotton-novelty-pendant/indexb485.html?preview_theme_id=105488777380"
                                       title="Variable Image "
                                       class="delay03 uppercase menu_lv1 "><span>Variable Image </span></a>

                                </li>

                                <li>


                                    <a href="products/silk-drum-lamp-shade/index1056.html?preview_theme_id=104817066148"
                                       title="Variable Select " class="delay03 uppercase menu_lv1 "><span>Variable Select </span></a>

                                </li>

                                <li>


                                    <a href="products/light-ceiling-light/index1056.html?preview_theme_id=104817066148"
                                       title="External / Affiliate" class="relative delay03 uppercase menu_lv1 "><span>External / Affiliate</span>
                                        <div class="absolute label_menu label_menu-external-affiliatehot-e62e05-5"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-external-affiliatehot-e62e05-5:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="products/hadley-32-cm-table-lamp/index8820.html?preview_theme_id=105497854116"
                                       title="Boosted Sale "
                                       class="delay03 uppercase menu_lv1 "><span>Boosted Sale </span></a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="PRODUCT EXTENDS " class="delay03 uppercase menu_lv1 "><span>PRODUCT EXTENDS </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="products/novelty-pendant/index6ae9.html?preview_theme_id=105488646308"
                                       title="Promo Text " class="delay03 uppercase menu_lv1 "><span>Promo Text </span></a>

                                </li>

                                <li>


                                    <a href="products/polyester-empire-lamp/index2bc1.html?preview_theme_id=104318861468"
                                       title="Trust Sale " class="delay03 uppercase menu_lv1 "><span>Trust Sale </span></a>

                                </li>

                                <li>


                                    <a href="products/hadley-32-cm-table-lamp/indexf68e.html?preview_theme_id=105488711844"
                                       title="Countdown "
                                       class="delay03 uppercase menu_lv1 "><span>Countdown </span></a>

                                </li>

                                <li>


                                    <a href="products/cotton-tapered-pendant/index1056.html?preview_theme_id=104817066148"
                                       title="Featured Video "
                                       class="delay03 uppercase menu_lv1 "><span>Featured Video </span></a>

                                </li>

                            </ul>


                        </div>

                    </div>


                    <div class="menu-horizon-list">


                        <a href="index.html" title="FEATURED" class="relative nammenu ">FEATURED</a>


                        <a data-check="c3" class="toggle-menumobile  js_icon_horizon-menu">
                            <i class=" fa fa-angle-right"></i>
                        </a>
                        <div class="c3 menu_lv2">

                            <a href="javascript:void(0)" title="FEATURED" class="js-back back-to"> FEATURED <i
                                    class="fa fa-angle-right pl-2 "></i> </a>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="ANIMATE DEMOS " class="delay03 uppercase menu_lv1 "><span>ANIMATE DEMOS </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="index.html" title="Quickview-Popup"
                                       class="relative delay03 uppercase menu_lv1 "><span>Quickview-Popup</span>
                                        <div class="absolute label_menu label_menu-quickview-popuptrend-1e73be-1"
                                             style="background-color: #1e73be;">TREND
                                        </div>
                                        <style>
                                            .label_menu-quickview-popuptrend-1e73be-1:before {
                                                border-top: 4px solid #1e73be;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="index.html" title="Minicart Draws "
                                       class="delay03 uppercase menu_lv1 "><span>Minicart Draws </span></a>

                                </li>

                                <li>


                                    <a href="index.html" title="Quick Add to cart"
                                       class="relative delay03 uppercase menu_lv1 "><span>Quick Add to cart</span>
                                        <div class="absolute label_menu label_menu-quick-add-to-cartnew-1ad441-3"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-quick-add-to-cartnew-1ad441-3:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">


                                <a href="index.html" title="9 PRODUCT HOVER" class="delay03 uppercase menu_lv1 "><span>9 PRODUCT HOVER</span>
                                    <div class="absolute label_menu label_menu-9-product-hoverhot-e62e05-2"
                                         style="background-color: #e62e05;">HOT
                                    </div>
                                    <style>
                                        .label_menu-9-product-hoverhot-e62e05-2:before {
                                            border-top: 4px solid #e62e05;
                                        }
                                    </style>
                                </a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="collections/all/index9632.html?preview_theme_id=105497886884"
                                       title="Product Hover Style 1" class="delay03 uppercase menu_lv1 "><span>Product Hover Style 1</span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexb50c.html?preview_theme_id=105497919652"
                                       title="Product Hover Style 2" class="delay03 uppercase menu_lv1 "><span>Product Hover Style 2</span></a>

                                </li>

                                <li>


                                    <a href="collections/all/indexe521.html?preview_theme_id=105497952420"
                                       title="Product Hover Style 3" class="delay03 uppercase menu_lv1 "><span>Product Hover Style 3</span></a>

                                </li>

                                <li>


                                    <a href="collections/all/index943f.html?preview_theme_id=105497985188"
                                       title="Product Hover Style 4" class="delay03 uppercase menu_lv1 "><span>Product Hover Style 4</span></a>

                                </li>

                                <li>


                                    <a href="pages/product-hover.html" title="All Style "
                                       class="relative delay03 uppercase menu_lv1 "><span>All Style </span>
                                        <div class="absolute label_menu label_menu-all-style-hot-e62e05-5"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-all-style-hot-e62e05-5:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="THEME ELEMENT " class="delay03 uppercase menu_lv1 "><span>THEME ELEMENT </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="index.html" title="Ajax Search " class="delay03 uppercase menu_lv1 "><span>Ajax Search </span></a>

                                </li>

                                <li>


                                    <a href="index.html" title="Ajax Minicart"
                                       class="relative delay03 uppercase menu_lv1 "><span>Ajax Minicart</span>
                                        <div class="absolute label_menu label_menu-ajax-minicartnew-1ad441-2"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-ajax-minicartnew-1ad441-2:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="index.html" title="Recently Products " class="delay03 uppercase menu_lv1 "><span>Recently Products </span></a>

                                </li>

                                <li>


                                    <a href="index.html" title="Social Share "
                                       class="delay03 uppercase menu_lv1 "><span>Social Share </span></a>

                                </li>

                            </ul>


                        </div>

                    </div>


                    <div class="menu-horizon-list">


                        <a href="index.html" title="PAGES" class="relative nammenu ">PAGES</a>


                        <a data-check="c4" class="toggle-menumobile  js_icon_horizon-menu">
                            <i class=" fa fa-angle-right"></i>
                        </a>
                        <div class="c4 menu_lv2">

                            <a href="javascript:void(0)" title="PAGES" class="js-back back-to"> PAGES <i
                                    class="fa fa-angle-right pl-2 "></i> </a>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="DEMO LAYOUTS " class="delay03 uppercase menu_lv1 "><span>DEMO LAYOUTS </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="index.html" title="Full Screen"
                                       class="relative delay03 uppercase menu_lv1 "><span>Full Screen</span>
                                        <div class="absolute label_menu label_menu-full-screennew-1ad441-1"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-full-screennew-1ad441-1:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="index.html" title="Heading Background "
                                       class="delay03 uppercase menu_lv1 "><span>Heading Background </span></a>

                                </li>

                                <li>


                                    <a href="index.html" title="Simple " class="delay03 uppercase menu_lv1 "><span>Simple </span></a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="PRE-BUILD PAGES " class="delay03 uppercase menu_lv1 "><span>PRE-BUILD PAGES </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="pages/about-us.html" title="About Us #1"
                                       class="relative delay03 uppercase menu_lv1 "><span>About Us #1</span>
                                        <div class="absolute label_menu label_menu-about-us-1hot-e62e05-1"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-about-us-1hot-e62e05-1:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="pages/about-us-2.html" title="About Us #2 "
                                       class="delay03 uppercase menu_lv1 "><span>About Us #2 </span></a>

                                </li>

                                <li>


                                    <a href="pages/contact-us.html" title="Contact Us #1 "
                                       class="delay03 uppercase menu_lv1 "><span>Contact Us #1 </span></a>

                                </li>

                                <li>


                                    <a href="pages/contact-us-2.html" title="  Contact us #2 "
                                       class="delay03 uppercase menu_lv1 "><span>  Contact us #2 </span></a>

                                </li>

                                <li>


                                    <a href="pages/faqs.html" title="FAQS " class="delay03 uppercase menu_lv1 "><span>FAQS </span></a>

                                </li>

                                <li>


                                    <a href="404.html" title="404 Page " class="delay03 uppercase menu_lv1 "><span>404 Page </span></a>

                                </li>

                                <li>


                                    <a href="account/register.html" title="Login/Register"
                                       class="relative delay03 uppercase menu_lv1 "><span>Login/Register</span>
                                        <div class="absolute label_menu label_menu-login-registernew-1ad441-7"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-login-registernew-1ad441-7:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="ECOMERCE " class="delay03 uppercase menu_lv1 "><span>ECOMERCE </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="cart.html" title="Cart" class="relative delay03 uppercase menu_lv1 "><span>Cart</span>
                                        <div class="absolute label_menu label_menu-carthot-e62e05-1"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-carthot-e62e05-1:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="index.html" title="Shop "
                                       class="delay03 uppercase menu_lv1 "><span>Shop </span></a>

                                </li>

                                <li>


                                    <a href="index.html" title="Checkout" class="delay03 uppercase menu_lv1 "><span>Checkout</span></a>

                                </li>

                                <li>


                                    <a href="account/register.html" title="My Account "
                                       class="delay03 uppercase menu_lv1 "><span>My Account </span></a>

                                </li>

                            </ul>


                        </div>

                    </div>


                    <div class="menu-horizon-list">


                        <a href="index.html" title="BLOGS" class="relative nammenu ">BLOGS</a>


                        <a data-check="c5" class="toggle-menumobile  js_icon_horizon-menu">
                            <i class=" fa fa-angle-right"></i>
                        </a>
                        <div class="c5 menu_lv2">

                            <a href="javascript:void(0)" title="BLOGS" class="js-back back-to"> BLOGS <i
                                    class="fa fa-angle-right pl-2 "></i> </a>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="SINGLE POST " class="delay03 uppercase menu_lv1 "><span>SINGLE POST </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="blogs/news/trend-we-are-loving-fluted-details/index1056.html?preview_theme_id=104817066148"
                                       title="No Sidebar"
                                       class="relative delay03 uppercase menu_lv1 "><span>No Sidebar</span>
                                        <div class="absolute label_menu label_menu-no-sidebarnew-1ad441-1"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-no-sidebarnew-1ad441-1:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="blogs/news/trend-we-are-loving-fluted-details/index6ae9.html?preview_theme_id=105488646308"
                                       title="Left Sidebar "
                                       class="delay03 uppercase menu_lv1 "><span>Left Sidebar </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/trend-we-are-loving-fluted-details/indexf68e.html?preview_theme_id=105488711844"
                                       title="Right Sidebar "
                                       class="delay03 uppercase menu_lv1 "><span>Right Sidebar </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/trend-we-are-loving-fluted-details/index1056.html?preview_theme_id=104817066148"
                                       title="Standard " class="delay03 uppercase menu_lv1 "><span>Standard </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/table-lamps-high-to-low/index1056.html?preview_theme_id=104817066148"
                                       title="Audio " class="delay03 uppercase menu_lv1 "><span>Audio </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/our-favorite-greige-colors/index1056.html?preview_theme_id=104817066148"
                                       title="Video" class="relative delay03 uppercase menu_lv1 "><span>Video</span>
                                        <div class="absolute label_menu label_menu-videohot-e62e05-6"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-videohot-e62e05-6:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                            </ul>


                            <h2 class="title_menu_mb relative">

                                <a href="index.html" title="LAYOUT "
                                   class="delay03 uppercase menu_lv1 "><span>LAYOUT </span></a>


                            </h2>
                            <ul class="list-unstyled mb-0 menu_lv3">

                                <li>


                                    <a href="blogs/news/index1056.html?preview_theme_id=104817066148"
                                       title="No Sidebar " class="delay03 uppercase menu_lv1 "><span>No Sidebar </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/index6ae9.html?preview_theme_id=105488646308"
                                       title="Left Sidebar" class="relative delay03 uppercase menu_lv1 "><span>Left Sidebar</span>
                                        <div class="absolute label_menu label_menu-left-sidebarnew-1ad441-2"
                                             style="background-color: #1ad441;">NEW
                                        </div>
                                        <style>
                                            .label_menu-left-sidebarnew-1ad441-2:before {
                                                border-top: 4px solid #1ad441;
                                            }
                                        </style>
                                    </a>

                                </li>

                                <li>


                                    <a href="blogs/news/indexf68e.html?preview_theme_id=105488711844"
                                       title="Right Sidebar "
                                       class="delay03 uppercase menu_lv1 "><span>Right Sidebar </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/index2bc1.html?preview_theme_id=104318861468" title="Standar "
                                       class="delay03 uppercase menu_lv1 "><span>Standar </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/indexb485.html?preview_theme_id=105488777380" title="Classic "
                                       class="delay03 uppercase menu_lv1 "><span>Classic </span></a>

                                </li>

                                <li>


                                    <a href="blogs/news/index8820.html?preview_theme_id=105497854116" title="Grid"
                                       class="relative delay03 uppercase menu_lv1 "><span>Grid</span>
                                        <div class="absolute label_menu label_menu-gridhot-e62e05-6"
                                             style="background-color: #e62e05;">HOT
                                        </div>
                                        <style>
                                            .label_menu-gridhot-e62e05-6:before {
                                                border-top: 4px solid #e62e05;
                                            }
                                        </style>
                                    </a>

                                </li>

                            </ul>


                        </div>

                    </div>


                </div>
                <!-- tab account login-regester-->
                <div role="tabpanel" class="tab-pane fade" id="tab_account_mobile">
                    <div class="overlay_login-content">
                        <div class="row justify-content-center box_content_accountdestop text-center">

                            <div class="formlogin">
                                <div class="login_primary CustomerLoginForm">
                                    <div class="login-icon">
                                        <span class="icon-icon-user"></span>
                                    </div>
                                    <div class="mailrrr mt-3">
                                        <form method="post"
                                              action="https://alamp-store-demo.myshopify.com/account/login"
                                              id="customer_login" accept-charset="UTF-8"
                                              data-login-with-shop-sign-in="true"><input type="hidden" name="form_type"
                                                                                         value="customer_login"><input
                                                type="hidden" name="utf8" value="✓">

                                            <div class="form-group">
                                                <input type="email" class="form-control" name="customer[email]"
                                                       placeholder="Email adress" required="">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password"
                                                       name="customer[password]" required="">
                                            </div>

                                            <div class="form-check">

                                                <a href="#recover" class="RecoverPassword">Forgot your password?</a>

                                            </div>
                                            <button type="submit" class="btn btn-dark w-100" value="Log In">
                                                Log In
                                            </button>
                                        </form>
                                    </div>
                                    <div class="or_creat my-3">
                                        <span>or</span>

                                        <div><a href="javascript:void(0)" class="jsCreate_account">Register now <i
                                                    class="ml-3 ti-arrow-right"></i></a></div>

                                    </div>
                                </div>
                                <form method="post" action="https://alamp-store-demo.myshopify.com/account/recover"
                                      accept-charset="UTF-8"><input type="hidden" name="form_type"
                                                                    value="recover_customer_password"><input
                                        type="hidden" name="utf8" value="✓">


                                    <div class="RecoverPasswordForm" style="display: none;">
                                        <div class="block-login">
                  <span>
                    <i class="ti-reload"></i>
                  </span>
                                            <h2 class="title24 text-center title-form-account">Reset your
                                                password</h2>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" placeholder="Email adress"
                                                           name="customer[email]" required="">
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" class="register-button" value="Submit">
                                            </div>
                                            <div class="table-custom create-account">
                                                <div class="text-center mt-4">
                                                    <a class="HideRecoverPasswordLink"
                                                       style="cursor: pointer;">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="form_register">
                                <div class="login_primary">
                                    <div class="login-icon register-icon">
                  <span class="ti-pencil-alt">
                  </span>
                                    </div>
                                    <span class="title_resgister">Register</span>
                                    <div class="mailrrr mt-3">
                                        <form method="post" action="https://alamp-store-demo.myshopify.com/account"
                                              id="create_customer" accept-charset="UTF-8"
                                              data-login-with-shop-sign-up="true"><input type="hidden" name="form_type"
                                                                                         value="create_customer"><input
                                                type="hidden" name="utf8" value="✓">

                                            <div class="form-group">
                                                <input type="email" placeholder="Email address" class="form-control"
                                                       name="customer[email]" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="customer[password]"
                                                       placeholder="Password" required="">
                                            </div>
                                            <button type="submit" class="btn btn-dark w-100" value="register">
                                                register
                                            </button>
                                        </form>
                                    </div>
                                    <div class="or_creat my-3">
                                        <span>or</span>

                                        <div><a href="javascript:void(0)" class="jsBack_login">Back to login <i
                                                    class="ml-3 ti-arrow-right"></i></a></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="close-menu-mobile text-center js-eveland-close">
                <i class="ti-close mr-3"></i>Close
            </div>
        </div>
    </div>
    <div class="poup-login-destop js-poup-login-destop d-none d-xl-block">
        <div class="overlay_login-content">
            <div class="row justify-content-center box_content_accountdestop text-center">
                <div class="formlogin-destop">
                    <div class="login_primary CustomerLoginForm">
                        <div class="login-icon-popup-login">

                            <a href="index.html">

                                <img src="cdn/shop/files/logo8579.png?v=1613770768" width="150"
                                     alt="Alamp - Interior Decor and Lights Responsive Shopify Theme">

                            </a>

                        </div>
                        <h2 class="title-tab-login">Great to have you back!</h2>
                        <div class="mailrrr mt-3">
                            <form method="post" action="https://alamp-store-demo.myshopify.com/account/login"
                                  id="customer_login" accept-charset="UTF-8" data-login-with-shop-sign-in="true">
                                <input type="hidden" name="form_type" value="customer_login"><input type="hidden"
                                                                                                    name="utf8"
                                                                                                    value="✓">

                                <div class="form-group">
                                    <input type="email" class="form-control" name="customer[email]"
                                           placeholder="Email adress" required="">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password"
                                           name="customer[password]" required="">
                                </div>

                                <div class="form-check">

                                    <a href="#recover" class="RecoverPassword">Forgot your password?</a>

                                </div>
                                <button type="submit" class="btn btn-dark w-100" value="Log In">
                                    Log In
                                </button>
                            </form>
                        </div>

                        <div class="or_creat my-3">

                            <div class="box-register"><span class="or-register mr-2">Don’t have an account?</span><a
                                    href="javascript:void(0)" class="jsCreate_account">Register now <i
                                        class="ml-2 ti-arrow-right"></i></a></div>

                        </div>
                    </div>
                    <form method="post" action="https://alamp-store-demo.myshopify.com/account/recover"
                          accept-charset="UTF-8"><input type="hidden" name="form_type"
                                                        value="recover_customer_password"><input type="hidden"
                                                                                                 name="utf8" value="✓">


                        <div class="RecoverPasswordForm" style="display: none;">
                            <div class="block-login">
            <span class="login-icon">
              <i class="ti-reload"></i>
            </span>
                                <h2 class="title_resgister title24 text-center title-form-account">Reset your
                                    password</h2>
                                <div class="form-group mb-0 row">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" placeholder="Email adress"
                                               name="customer[email]" required="">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn register-button" value="Submit">
                                </div>
                                <div class="table-custom create-account">
                                    <div class="box-register text-center mt-4">
                                        <a class="HideRecoverPasswordLink" style="cursor: pointer;">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form_register-destop">
                    <div class="login_primary">
                        <div class="login-icon register-icon">
            <span class="ti-pencil-alt">
            </span>
                        </div>
                        <span class="title_resgister">Register</span>
                        <div class="mailrrr mt-3">
                            <form method="post" action="https://alamp-store-demo.myshopify.com/account"
                                  id="create_customer" accept-charset="UTF-8" data-login-with-shop-sign-up="true">
                                <input type="hidden" name="form_type" value="create_customer"><input type="hidden"
                                                                                                     name="utf8"
                                                                                                     value="✓">

                                <div class="form-group">
                                    <input type="email" placeholder="Email address" class="form-control"
                                           name="customer[email]" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="customer[password]"
                                           placeholder="Password" required="">
                                </div>
                                <button type="submit" class="btn btn-dark w-100" value="register">
                                    register
                                </button>
                            </form>
                        </div>
                        <div class="or_creat my-3">

                            <div class="box-register"><a href="javascript:void(0)" class="jsBack_login">Back to
                                    login <i class="ml-3 ti-arrow-right"></i></a></div>

                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" class="eveland-close-login js-eveland-close-login set-16-svg fill-white">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                     id="Capa_1" x="0px" y="0px" viewBox="0 0 298.667 298.667"
                     style="enable-background:new 0 0 298.667 298.667;" xml:space="preserve">
      <g>
          <g>
              <polygon
                  points="298.667,30.187 268.48,0 149.333,119.147 30.187,0 0,30.187 119.147,149.333 0,268.48 30.187,298.667     149.333,179.52 268.48,298.667 298.667,268.48 179.52,149.333   "></polygon>
          </g>
      </g>

      </svg>
            </a>
        </div>
    </div>
    <div class="bg-login-popup js-bg-login-popup"></div>
    <!-- BEGIN content_for_index -->
    <div id="shopify-section-1594865479831" class="shopify-section index-section">
        <div data-section-id="1594865479831" data-section-type="section-slideshow-v2" style="  ">
            <div class="section-slideshow-v2">
                <div class="">
                    <div class="slick-side-h2 slick-initialized slick-slider slick-dotted" role="toolbar">
                        <button type="button" class="prev-slide slick-arrow" style=""><i class="fa fa-angle-left"
                                                                                         aria-hidden="true"></i>
                        </button>


                        <div aria-live="polite" class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 2880px;" role="listbox">
                                <div class="itemv-slide-h2 slick-slide" data-slick-index="0" aria-hidden="true"
                                     style="width: 1440px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"
                                     tabindex="-1" role="option" aria-describedby="slick-slide20">
                                    <div class="info-sideh2">
                                        <div class="picture-slideshow">

                                            <a href="collections/all.html" tabindex="-1">
                                                <img src="cdn/shop/files/slide2.18aba.jpg?v=1613763424"
                                                     class="img-responsive img_slideh1" alt="">
                                            </a>

                                        </div>
                                        <div class="box-content">

                                            <div class="box-title">
                                                <h3 class="titlebig mb-0" style="color:#ffffff">Lighting
                                                    Accessories</h3>
                                            </div>


                                            <div class="subtitle-2">

                                                <p class="mb-0" style="color:#ffffff;">Sale up to 50% off today</p>

                                            </div>


                                            <div class="box-button">
                                                <a class="button-main1 button-shop-1594865479831-1594865479831-0"
                                                   href="collections/all.html" style="color:#ffffff; background:#c5ac9b"
                                                   tabindex="-1">
                                                    Shop All Collection
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="itemv-slide-h2 slick-slide slick-current slick-active" data-slick-index="1"
                                     aria-hidden="false"
                                     style="width: 1440px; position: relative; left: -1440px; top: 0px; z-index: 999; opacity: 1;"
                                     tabindex="-1" role="option" aria-describedby="slick-slide21">
                                    <div class="info-sideh2">
                                        <div class="picture-slideshow">

                                            <a href="collections/all.html" tabindex="0">
                                                <img src="cdn/shop/files/slide2.2b792.jpg?v=1613763432"
                                                     class="img-responsive img_slideh1" alt="">
                                            </a>

                                        </div>
                                        <div class="box-content">

                                            <div class="box-title">
                                                <h3 class="titlebig mb-0" style="color:#ffffff">Decorative Lighting</h3>
                                            </div>


                                            <div class="subtitle-2">

                                                <p class="mb-0" style="color:#ffffff;">Sale up to 50% off today</p>

                                            </div>


                                            <div class="box-button">
                                                <a class="button-main1 button-shop-1594865479831-1594865479831-1"
                                                   href="collections/all.html" style="color:#ffffff; background:#c5ac9b"
                                                   tabindex="0">
                                                    Shop All Collection
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="button" class="next-slide slick-arrow" style=""><i class="fa fa-angle-right"
                                                                                         aria-hidden="true"></i>
                        </button>
                        <ul class="slick-dots" style="" role="tablist">
                            <li class="" aria-hidden="true" role="presentation" aria-selected="true"
                                aria-controls="navigation20" id="slick-slide20">
                                <button type="button" data-role="none" role="button" tabindex="0">1</button>
                            </li>
                            <li aria-hidden="false" role="presentation" aria-selected="false"
                                aria-controls="navigation21" id="slick-slide21" class="slick-active">
                                <button type="button" data-role="none" role="button" tabindex="0">2</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <style>


            .section-slideshow-v2 .slick-active .info-sideh2 .box-content .button-shop-1594865479831-1594865479831-0:hover {
                color: #222222 !important;
                background: #ffffff !important;
            }


            .section-slideshow-v2 .slick-active .info-sideh2 .box-content .button-shop-1594865479831-1594865479831-1:hover {
                color: #222222 !important;
                background: #ffffff !important;
            }


        </style>


    </div>
    <div id="shopify-section-1594783308187" class="shopify-section">
        <div data-section-id="1594783308187" data-section-type="section-banner-v3" style=" ">
            <div class="section-banner-v3">
                <div class=" lazyloaded">
                    <div class="row no-gutters">
                        <div class=" col-banner-6 order-sm-1  order-md-1 ">
                            <div class="box-img img-left"
                                 style="background-image: url( cdn/shop/files/banner3.11b12.jpg?v=1613762635)">
                                <a href="collections/all.html">

                                    <img
                                        data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.1.jpg?v=1613762635"
                                        class="img-fluid w-100 lazyloaded" alt=""
                                        src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.1.jpg?v=1613762635">

                                </a>
                                <div class="banner-content">

                                    <h3 class="title-banner" style="color: #000000">Carnegie Light<br> Armed Scone
                                    </h3>


                                    <p class="sub-title" style="color: #888888">Retro open basket design wall light
                                        in a black finish,<br> featuring an inner clear glass cylinder light shade.
                                    </p>


                                    <a href="collections/all.html" class="button-shop" title="">SHOP NOW</a>


                                </div>
                            </div>
                        </div>
                        <div class=" col-banner-4 order-sm-2  order-md-2  ">
                            <div class="box-img img-right">
                                <a href="collections/all.html">

                                    <img
                                        data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.2.jpg?v=1613762693"
                                        class="img-fluid w-100 lazyloaded" alt=""
                                        src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.2.jpg?v=1613762693">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1594785418038" class="shopify-section">
        <div data-section-id="1594785418038" data-section-type="section-banner-v3" style=" ">
            <div class="section-banner-v3">
                <div class=" lazyloaded">
                    <div class="row no-gutters">
                        <div class=" col-banner-6 order-sm-1  order-md-2  ">
                            <div class="box-img img-left"
                                 style="background-image: url( cdn/shop/files/banner3.3736a.jpg?v=1613762687)">
                                <a href="collections/all.html">

                                    <img
                                        data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.3.jpg?v=1613762687"
                                        class="img-fluid w-100 ls-is-cached lazyloaded" alt=""
                                        src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.3.jpg?v=1613762687">

                                </a>
                                <div class="banner-content">

                                    <h3 class="title-banner" style="color: #000000">Corinne 3-Light<br> Flush Mount
                                    </h3>


                                    <p class="sub-title" style="color: #888888">Retro open basket design wall light
                                        in a black finish,<br> featuring an inner clear glass cylinder light shade.
                                    </p>


                                    <a href="collections/all.html" class="button-shop" title="">SHOP NOW</a>


                                </div>
                            </div>
                        </div>
                        <div class=" col-banner-4 order-sm-2  order-md-1 ">
                            <div class="box-img img-right">
                                <a href="collections/all.html">

                                    <img
                                        data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.4.jpg?v=1613762641"
                                        class="img-fluid w-100 ls-is-cached lazyloaded" alt=""
                                        src="//alamp-store-demo.myshopify.com/cdn/shop/files/banner3.4.jpg?v=1613762641">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1594806436687" class="shopify-section">
        <div data-section-id="1594806436687" data-section-type="section-product-v2" style=" ">
            <div class="section-product-v3 mt-all">
                <div class="container container-v2">
                    <div class="text-center .title-product-v3">

                        <h3 class="block-title title_heading" style="color : ">Best Seller</h3>

                    </div>
                    <div class="row">
                        <div class="product_best_sell engoc-row-equal">


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/dome-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/17.1.jpg?v=1594630184"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Dome Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/17.4.jpg?v=1594630184"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Dome Pendant">


                                            </a>

                                            <!--     label product -->


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="dome-pendant" data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/17.1_grande.jpg?v=1594630184"
             style="background-color: black;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/17.2_grande.jpg?v=1594630184"
             style="background-color: copper;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/dome-pendant.html">Dome Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$95.00</span>


                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/dome-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/novelty-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/16.1.jpg?v=1594628699"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Novelty Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/16.3.jpg?v=1594628699"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Novelty Pendant">


                                            </a>

                                            <!--     label product -->


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="novelty-pendant" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/16.1_grande.jpg?v=1594628699"
             style="background-color: mintcream;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/16.2_grande.jpg?v=1594628699"
             style="border: 1px solid #bcbcbc; background-color: white;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/novelty-pendant.html">Novelty Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$78.00</span>


                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/novelty-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/cohen-1-light-dome-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/15.1.jpg?v=1594627256"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Cohen 1-Light Dome Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/15.4.jpg?v=1594627256"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Cohen 1-Light Dome Pendant">


                                            </a>

                                            <!--     label product -->


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="cohen-1-light-dome-pendant" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/15.1_grande.jpg?v=1594627256"
             style="background-color: grey;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/15.2_grande.jpg?v=1594627256"
             style="background-color: lightyellow;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/cohen-1-light-dome-pendant.html">Cohen 1-Light Dome
                                                Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$96.00</span>


                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/cohen-1-light-dome-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/single-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/14.1.jpg?v=1594625403"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Single Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/14.2.jpg?v=1594625404"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Single Pendant">


                                            </a>

                                            <!--     label product -->


                                            <figure style="background : #e12c43; color: #ffffff"
                                                    class="absolute uppercase label-sale text-center">
                                                <span class="sale-percent">-22%</span>
                                            </figure>


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="single-pendant" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/14.1_grande.jpg?v=1594625403"
             style="border: 1px solid #bcbcbc; background-color: white;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/14.2_grande.jpg?v=1594625404"
             style="background-color: black;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/single-pendant.html">Single Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$22.00</span>
                                            <s class="price-old">$28.00</s>

                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/single-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/light-drum-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/13.1.jpg?v=1594624914"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Light Drum Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/13.4.jpg?v=1594624914"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Light Drum Pendant">


                                            </a>

                                            <!--     label product -->


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="light-drum-pendant" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/13.1_grande.jpg?v=1594624914"
             style="border: 1px solid #bcbcbc; background-color: white;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/13.2_grande.jpg?v=1594624914"
             style="background-color: grey;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/light-drum-pendant.html">Light Drum Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$78.00</span>


                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">

                                            <a href="products/light-drum-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View more">
                                                View more
                                            </a>

                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/cotton-novelty-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/12.1.jpg?v=1594616410"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Cotton Novelty Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/12.4.jpg?v=1594616410"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Cotton Novelty Pendant">


                                            </a>

                                            <!--     label product -->


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="cotton-novelty-pendant" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/12.1_grande.jpg?v=1594616410"
             style="background-color: grey;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/12.2_grande.jpg?v=1594616410"
             style="background-color: black;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/12.3_grande.jpg?v=1594616410"
             style="background-color: yellow;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/12.4_grande.jpg?v=1594616410"
             style="background-color: teal;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/cotton-novelty-pendant.html">Cotton Novelty
                                                Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$35.00</span>


                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/cotton-novelty-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/polyester-empire-lamp.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/11.1.jpg?v=1594615520"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Polyester Empire Lamp">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/11.4.jpg?v=1594615521"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Polyester Empire Lamp">


                                            </a>

                                            <!--     label product -->


                                            <figure style="background : #e12c43; color: #ffffff"
                                                    class="absolute uppercase label-sale text-center">
                                                <span class="sale-percent">-18%</span>
                                            </figure>


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="polyester-empire-lamp" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/11.1_grande.jpg?v=1594615520"
             style="background-color: black;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/11.2_grande.jpg?v=1594615520"
             style="border: 1px solid #bcbcbc; background-color: white;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/11.3_grande.jpg?v=1594615521"
             style="background-color: ivory;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/polyester-empire-lamp.html">Polyester Empire Lamp</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$33.00</span>
                                            <s class="price-old">$40.00</s>

                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/polyester-empire-lamp.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class=" col-lg-3 col-6 col-md-4">

                                <div class="product-item-v5">


                                    <div class="product mb-30 engoj_grid_parent relative">
                                        <div class="img-product relative">
                                            <a href="products/cotton-tapered-pendant.html" class="engoj_find_img">
                                                <img style="width: 100%"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/10.1.jpg?v=1594614439"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive" alt="Cotton Tapered Pendant">


                                                <img style="width: 100%"
                                                     datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/7.2_cf582398-5f78-436d-83a5-11c498fde23c.jpg?v=1594614439"
                                                     src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                     class="lazyload img-responsive absolute img-product-hover"
                                                     alt="Cotton Tapered Pendant">


                                            </a>

                                            <!--     label product -->


                                            <!--     END LABEL -->


                                            <!--     ICON PRODUCT -->


                                            <div class="product-icon-action d-flex mb-0 text-center">

                                                <div class="add-wishlist mr-0 w-50">

                                                    <a href="account/login.html"
                                                       class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Add to Wishlist">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>

                                                </div>

                                                <div class="quick-view mr-0 w-50">
                                                    <a href="javascript:void(0)"
                                                       class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                       data-id="cotton-tapered-pendant" data-toggle="tooltip"
                                                       data-placement="top" data-original-title="Quickview">

                                                        <i class="fsz-unset">
                                                            <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 400 400" height="400" width="400"
                                                                 id="svg2" version="1.1"
                                                                 xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                 xmlns:cc="http://creativecommons.org/ns#"
                                                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                 xmlns:svg="http://www.w3.org/2000/svg"
                                                                 xml:space="preserve"><metadata id="metadata8">
                                                                    <rdf>
                                                                        <work rdf:about="">
                                                                            <format>image/svg+xml</format>
                                                                            <type
                                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                        </work>
                                                                    </rdf>
                                                                </metadata>
                                                                <defs id="defs6"></defs>
                                                                <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                   id="g10">
                                                                    <g transform="scale(0.1)" id="g12">
                                                                        <path id="path14"
                                                                              style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                              d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                    </g>
                                                                </g></svg>
                                                        </i>

                                                    </a>
                                                </div>

                                            </div>
                                            <!--     END ICON -->


                                            <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/10.1_grande.jpg?v=1594614439"
             style="background-color: yellow;"></a>
        </span>


                                                <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/10.2_grande.jpg?v=1594614439"
             style="background-color: slategray;"></a>
        </span>


                                            </nav>
                                        </div>

                                        <h4 class="des-font capital title-product mb-0">
                                            <a href="products/cotton-tapered-pendant.html">Cotton Tapered
                                                Pendant</a>
                                        </h4>
                                        <!--     PRICE -->


                                        <p class="price-product mb-0">
                                            <span class="price">$16.00</span>


                                        </p>
                                        <!-- END PRODUCT     -->

                                        <!--     THUMBNAIL PRODUCT -->


                                        <!-- END THUMBNAIL     -->

                                        <div class="add-to-cart mr-0">


                                            <a href="products/cotton-tapered-pendant.html"
                                               class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Select Option">
                                                Select Option
                                            </a>


                                        </div>

                                    </div>

                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1594802584332" class="shopify-section index-section">
        <div data-section-id="1594802584332" data-section-type="section-testimonial" style=" ">
            <div class="section-testimonial-v1 lazyload" data-bg="cdn/shop/files/bg_testimonialbfa7.jpg?v=1613763110">
                <div class="container container-testimonial">
                    <div class="text-center">
                        <h3 class="title_heading mb-5" d="">TESTIMONIALS</h3>
                    </div>
                    <div class="js-testimonial-v1-slide slick-initialized slick-slider slick-dotted" role="toolbar">


                        <div aria-live="polite" class="slick-list draggable">
                            <div class="slick-track"
                                 style="opacity: 1; width: 3480px; transform: translate3d(0px, 0px, 0px);"
                                 role="listbox">
                                <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                     aria-hidden="false" style="width: 870px;" tabindex="-1" role="option"
                                     aria-describedby="slick-slide10">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-info">
                                            <div class="avatar">

                                                <img width="88" height="88"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/testimonial1.1.jpg?v=1613762711"
                                                     class="lazyload img-responsive" alt="testimonial">

                                            </div>
                                            <div class="author-info">
                                                <h3 class="mb-1">DESTINEE</h3>
                                                <p class="text-position">Marketing Personal</p>
                                            </div>
                                            <p class="content mar-bottom-15">Saved our business! We have no regrets!
                                                Thanks
                                                for the great service. This template is worth much more than I paid
                                                Saved
                                                our business! We have no regrets!</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 870px;"
                                     tabindex="-1" role="option" aria-describedby="slick-slide11">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-info">
                                            <div class="avatar">

                                                <img width="88" height="88"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/testimonial1.2.jpg?v=1613762711"
                                                     class="lazyload img-responsive" alt="testimonial">

                                            </div>
                                            <div class="author-info">
                                                <h3 class="mb-1">DESTINEE</h3>
                                                <p class="text-position">Marketing Personal</p>
                                            </div>
                                            <p class="content mar-bottom-15">Saved our business! We have no regrets!
                                                Thanks
                                                for the great service. This template is worth much more than I paid
                                                Saved
                                                our business! We have no regrets!</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 870px;"
                                     tabindex="-1" role="option" aria-describedby="slick-slide12">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-info">
                                            <div class="avatar">

                                                <img width="88" height="88"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/testimonial1.3.jpg?v=1613762712"
                                                     class="lazyload img-responsive" alt="testimonial">

                                            </div>
                                            <div class="author-info">
                                                <h3 class="mb-1">DESTINEE</h3>
                                                <p class="text-position">Marketing Personal</p>
                                            </div>
                                            <p class="content mar-bottom-15">Saved our business! We have no regrets!
                                                Thanks
                                                for the great service. This template is worth much more than I paid
                                                Saved
                                                our business! We have no regrets!</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 870px;"
                                     tabindex="-1" role="option" aria-describedby="slick-slide13">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-info">
                                            <div class="avatar">

                                                <img width="88" height="88"
                                                     data-src="//alamp-store-demo.myshopify.com/cdn/shop/files/testimonial1.4.jpg?v=1613762712"
                                                     class="lazyload img-responsive" alt="testimonial">

                                            </div>
                                            <div class="author-info">
                                                <h3 class="mb-1">DESTINEE</h3>
                                                <p class="text-position">Marketing Personal</p>
                                            </div>
                                            <p class="content mar-bottom-15">Saved our business! We have no regrets!
                                                Thanks
                                                for the great service. This template is worth much more than I paid
                                                Saved
                                                our business! We have no regrets!</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <ul class="slick-dots" style="" role="tablist">
                            <li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true"
                                aria-controls="navigation10" id="slick-slide10">
                                <button type="button" data-role="none" role="button" tabindex="0">1</button>
                            </li>
                            <li aria-hidden="true" role="presentation" aria-selected="false"
                                aria-controls="navigation11" id="slick-slide11">
                                <button type="button" data-role="none" role="button" tabindex="0">2</button>
                            </li>
                            <li aria-hidden="true" role="presentation" aria-selected="false"
                                aria-controls="navigation12" id="slick-slide12">
                                <button type="button" data-role="none" role="button" tabindex="0">3</button>
                            </li>
                            <li aria-hidden="true" role="presentation" aria-selected="false"
                                aria-controls="navigation13" id="slick-slide13">
                                <button type="button" data-role="none" role="button" tabindex="0">4</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1594807669787" class="shopify-section">
        <div data-section-id="1594807669787" data-section-type="section-product-v1" style=" ">
            <div class="section-product-v1 mt-all">
                <div class="container container-v2">
                    <div class="text-center">

                        <h3 class="title_heading mb-0">Hot Deal</h3>


                        <span class="sub_heading">
          Don't Miss Today's Featured Deals
        </span>

                    </div>
                    <div class="row js_section_product mt-50 slick-initialized slick-slider">


                        <div aria-live="polite" class="slick-list draggable">
                            <div class="slick-track"
                                 style="opacity: 1; width: 1440px; transform: translate3d(0px, 0px, 0px);"
                                 role="listbox">
                                <div class="col-md-4 col-12 product_item slick-slide slick-current slick-active"
                                     data-slick-index="0" aria-hidden="false" style="width: 360px;" tabindex="-1"
                                     role="option" aria-describedby="slick-slide40">

                                    <div class="product-item-v5">


                                        <div class="product mb-30 engoj_grid_parent relative">
                                            <div class="img-product relative">
                                                <a href="products/cohen-1-light-dome-pendant.html"
                                                   class="engoj_find_img" tabindex="0">
                                                    <img style="width: 100%"
                                                         data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/15.1.jpg?v=1594627256"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive"
                                                         alt="Cohen 1-Light Dome Pendant">


                                                    <img style="width: 100%"
                                                         datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/15.4.jpg?v=1594627256"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive absolute img-product-hover"
                                                         alt="Cohen 1-Light Dome Pendant">


                                                </a>

                                                <!--     label product -->


                                                <!--     END LABEL -->


                                                <!--     ICON PRODUCT -->


                                                <div class="product-icon-action d-flex mb-0 text-center">

                                                    <div class="add-wishlist mr-0 w-50">

                                                        <a href="account/login.html"
                                                           class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                           data-toggle="tooltip" data-placement="top"
                                                           data-original-title="Add to Wishlist" tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>

                                                    </div>

                                                    <div class="quick-view mr-0 w-50">
                                                        <a href="javascript:void(0)"
                                                           class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                           data-id="cohen-1-light-dome-pendant" data-toggle="tooltip"
                                                           data-placement="top" data-original-title="Quickview"
                                                           tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>
                                                    </div>

                                                </div>
                                                <!--     END ICON -->


                                                <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/15.1_grande.jpg?v=1594627256"
             style="background-color: grey;" tabindex="0"></a>
        </span>


                                                    <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/15.2_grande.jpg?v=1594627256"
             style="background-color: lightyellow;" tabindex="0"></a>
        </span>


                                                </nav>
                                            </div>

                                            <h4 class="des-font capital title-product mb-0">
                                                <a href="products/cohen-1-light-dome-pendant.html" tabindex="0">Cohen
                                                    1-Light Dome
                                                    Pendant</a>
                                            </h4>
                                            <!--     PRICE -->


                                            <p class="price-product mb-0">
                                                <span class="price">$96.00</span>


                                            </p>
                                            <!-- END PRODUCT     -->

                                            <!--     THUMBNAIL PRODUCT -->


                                            <!-- END THUMBNAIL     -->

                                            <div class="add-to-cart mr-0">


                                                <a href="products/cohen-1-light-dome-pendant.html"
                                                   class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                                   data-placement="top" data-original-title="Select Option"
                                                   tabindex="0">
                                                    Select Option
                                                </a>


                                            </div>

                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-4 col-12 product_item slick-slide slick-active" data-slick-index="1"
                                     aria-hidden="false" style="width: 360px;" tabindex="-1" role="option"
                                     aria-describedby="slick-slide41">

                                    <div class="product-item-v5">


                                        <div class="product mb-30 engoj_grid_parent relative">
                                            <div class="img-product relative">
                                                <a href="products/light-drum-pendant.html" class="engoj_find_img"
                                                   tabindex="0">
                                                    <img style="width: 100%"
                                                         data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/13.1.jpg?v=1594624914"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive" alt="Light Drum Pendant">


                                                    <img style="width: 100%"
                                                         datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/13.4.jpg?v=1594624914"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive absolute img-product-hover"
                                                         alt="Light Drum Pendant">


                                                </a>

                                                <!--     label product -->


                                                <!--     END LABEL -->


                                                <!--     ICON PRODUCT -->


                                                <div class="product-icon-action d-flex mb-0 text-center">

                                                    <div class="add-wishlist mr-0 w-50">

                                                        <a href="account/login.html"
                                                           class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                           data-toggle="tooltip" data-placement="top"
                                                           data-original-title="Add to Wishlist" tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>

                                                    </div>

                                                    <div class="quick-view mr-0 w-50">
                                                        <a href="javascript:void(0)"
                                                           class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                           data-id="light-drum-pendant" data-toggle="tooltip"
                                                           data-placement="top" data-original-title="Quickview"
                                                           tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>
                                                    </div>

                                                </div>
                                                <!--     END ICON -->


                                                <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/13.1_grande.jpg?v=1594624914"
             style="border: 1px solid #bcbcbc; background-color: white;" tabindex="0"></a>
        </span>


                                                    <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/13.2_grande.jpg?v=1594624914"
             style="background-color: grey;" tabindex="0"></a>
        </span>


                                                </nav>
                                            </div>

                                            <h4 class="des-font capital title-product mb-0">
                                                <a href="products/light-drum-pendant.html" tabindex="0">Light Drum
                                                    Pendant</a>
                                            </h4>
                                            <!--     PRICE -->


                                            <p class="price-product mb-0">
                                                <span class="price">$78.00</span>


                                            </p>
                                            <!-- END PRODUCT     -->

                                            <!--     THUMBNAIL PRODUCT -->


                                            <!-- END THUMBNAIL     -->

                                            <div class="add-to-cart mr-0">

                                                <a href="products/light-drum-pendant.html"
                                                   class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                                   data-placement="top" data-original-title="View more" tabindex="0">
                                                    View more
                                                </a>

                                            </div>

                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-4 col-12 product_item slick-slide slick-active" data-slick-index="2"
                                     aria-hidden="false" style="width: 360px;" tabindex="-1" role="option"
                                     aria-describedby="slick-slide42">

                                    <div class="product-item-v5">


                                        <div class="product mb-30 engoj_grid_parent relative">
                                            <div class="img-product relative">
                                                <a href="products/cotton-tapered-pendant.html" class="engoj_find_img"
                                                   tabindex="0">
                                                    <img style="width: 100%"
                                                         data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/10.1.jpg?v=1594614439"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive" alt="Cotton Tapered Pendant">


                                                    <img style="width: 100%"
                                                         datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/7.2_cf582398-5f78-436d-83a5-11c498fde23c.jpg?v=1594614439"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive absolute img-product-hover"
                                                         alt="Cotton Tapered Pendant">


                                                </a>

                                                <!--     label product -->


                                                <!--     END LABEL -->


                                                <!--     ICON PRODUCT -->


                                                <div class="product-icon-action d-flex mb-0 text-center">

                                                    <div class="add-wishlist mr-0 w-50">

                                                        <a href="account/login.html"
                                                           class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                           data-toggle="tooltip" data-placement="top"
                                                           data-original-title="Add to Wishlist" tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>

                                                    </div>

                                                    <div class="quick-view mr-0 w-50">
                                                        <a href="javascript:void(0)"
                                                           class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                           data-id="cotton-tapered-pendant" data-toggle="tooltip"
                                                           data-placement="top" data-original-title="Quickview"
                                                           tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>
                                                    </div>

                                                </div>
                                                <!--     END ICON -->


                                                <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/10.1_grande.jpg?v=1594614439"
             style="background-color: yellow;" tabindex="0"></a>
        </span>


                                                    <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/10.2_grande.jpg?v=1594614439"
             style="background-color: slategray;" tabindex="0"></a>
        </span>


                                                </nav>
                                            </div>

                                            <h4 class="des-font capital title-product mb-0">
                                                <a href="products/cotton-tapered-pendant.html" tabindex="0">Cotton
                                                    Tapered Pendant</a>
                                            </h4>
                                            <!--     PRICE -->


                                            <p class="price-product mb-0">
                                                <span class="price">$16.00</span>


                                            </p>
                                            <!-- END PRODUCT     -->

                                            <!--     THUMBNAIL PRODUCT -->


                                            <!-- END THUMBNAIL     -->

                                            <div class="add-to-cart mr-0">


                                                <a href="products/cotton-tapered-pendant.html"
                                                   class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                                   data-placement="top" data-original-title="Select Option"
                                                   tabindex="0">
                                                    Select Option
                                                </a>


                                            </div>

                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-4 col-12 product_item slick-slide slick-active" data-slick-index="3"
                                     aria-hidden="false" style="width: 360px;" tabindex="-1" role="option"
                                     aria-describedby="slick-slide43">

                                    <div class="product-item-v5">


                                        <div class="product mb-30 engoj_grid_parent relative">
                                            <div class="img-product relative">
                                                <a href="products/silk-drum-lamp-shade.html" class="engoj_find_img"
                                                   tabindex="0">
                                                    <img style="width: 100%"
                                                         data-src="//alamp-store-demo.myshopify.com/cdn/shop/products/9.1.jpg?v=1594613923"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive" alt="Silk Drum Lamp Shade">


                                                    <img style="width: 100%"
                                                         datasrc="//alamp-store-demo.myshopify.com/cdn/shop/products/9.4.jpg?v=1594613924"
                                                         src="cdn/shop/t/3/assets/loadingcd8f.gif?v=70316576320155527421594441399"
                                                         class="lazyload img-responsive absolute img-product-hover"
                                                         alt="Silk Drum Lamp Shade">


                                                </a>

                                                <!--     label product -->


                                                <figure style="background : #e12c43; color: #ffffff"
                                                        class="absolute uppercase label-sale text-center">
                                                    <span class="sale-percent">-28%</span>
                                                </figure>


                                                <!--     END LABEL -->


                                                <!--     ICON PRODUCT -->


                                                <div class="product-icon-action d-flex mb-0 text-center">

                                                    <div class="add-wishlist mr-0 w-50">

                                                        <a href="account/login.html"
                                                           class="box-shadow  inline-block maxus-product__wishlist wish text-center"
                                                           data-toggle="tooltip" data-placement="top"
                                                           data-original-title="Add to Wishlist" tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 903,2424.4 c 157.9,0 306.4,-61.5 418.1,-173.1 l 134.8,-134.9 c 20.7,-20.6 48.1,-32 77.1,-32 29,0 56.4,11.4 77,32 l 133.7,133.7 c 111.7,111.6 259.9,173.1 417.5,173.1 156.91,0 305,-61.3 416.8,-172.5 111.2,-111.3 172.5,-259.5 172.5,-417.5 0.6,-157.3 -60.69,-305.5 -172.5,-417.4 L 1531.5,373.5 487.402,1417.6 c -111.601,111.7 -173.105,259.9 -173.105,417.5 0,158.1 61.199,306.1 172.5,416.8 111.308,111.2 259.101,172.5 416.203,172.5 z m 1829.7,-19.6 c 0,0 0,0 -0.1,0 -152.4,152.4 -355.1,236.3 -570.9,236.3 -215.7,0 -418.7,-84.1 -571.5,-236.9 l -56.9,-57 -58.2,58.2 c -153.1,153.1 -356.3,237.5 -572.1,237.5 -215.305,0 -417.902,-83.9 -570.305,-236.3 -153,-153 -236.8942,-356 -236.2966,-571.5 0,-215 84.4026,-417.8 237.4966,-571 L 1454.7,143.301 c 20.5,-20.403 48.41,-32.199 76.8,-32.199 28.7,0 56.7,11.5 76.7,31.597 L 2731.5,1261.8 c 152.7,152.7 236.8,355.7 236.8,571.4 0.7,216 -83,419 -235.6,571.6"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>

                                                    </div>

                                                    <div class="quick-view mr-0 w-50">
                                                        <a href="javascript:void(0)"
                                                           class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                           data-id="silk-drum-lamp-shade" data-toggle="tooltip"
                                                           data-placement="top" data-original-title="Quickview"
                                                           tabindex="0">

                                                            <i class="fsz-unset">
                                                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 400 400" height="400" width="400"
                                                                     id="svg2" version="1.1"
                                                                     xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                     xmlns:cc="http://creativecommons.org/ns#"
                                                                     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                     xmlns:svg="http://www.w3.org/2000/svg"
                                                                     xml:space="preserve"><metadata id="metadata8">
                                                                        <rdf>
                                                                            <work rdf:about="">
                                                                                <format>image/svg+xml</format>
                                                                                <type
                                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type>
                                                                            </work>
                                                                        </rdf>
                                                                    </metadata>
                                                                    <defs id="defs6"></defs>
                                                                    <g transform="matrix(1.3333333,0,0,-1.3333333,0,400)"
                                                                       id="g10">
                                                                        <g transform="scale(0.1)" id="g12">
                                                                            <path id="path14"
                                                                                  style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                  d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path>
                                                                        </g>
                                                                    </g></svg>
                                                            </i>

                                                        </a>
                                                    </div>

                                                </div>
                                                <!--     END ICON -->


                                                <nav class="engoj_select_color variant-product">












        <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/9.1_grande.jpg?v=1594613923"
             style="background-color: mediumblue;" tabindex="0"></a>
        </span>


                                                    <span class="">
          <a class="circle mr-0" href="javascript:void(0)"
             data-engojvariant-img="//alamp-store-demo.myshopify.com/cdn/shop/products/9.2_grande.jpg?v=1594613924"
             style="background-color: chartreuse;" tabindex="0"></a>
        </span>


                                                </nav>
                                            </div>

                                            <h4 class="des-font capital title-product mb-0">
                                                <a href="products/silk-drum-lamp-shade.html" tabindex="0">Silk Drum Lamp
                                                    Shade</a>
                                            </h4>
                                            <!--     PRICE -->


                                            <p class="price-product mb-0">
                                                <span class="price">$18.00</span>
                                                <s class="price-old">$25.00</s>

                                            </p>
                                            <!-- END PRODUCT     -->

                                            <!--     THUMBNAIL PRODUCT -->


                                            <!-- END THUMBNAIL     -->

                                            <div class="add-to-cart mr-0">


                                                <a href="products/silk-drum-lamp-shade.html"
                                                   class="inline-block icon-addcart  box-shadow" data-toggle="tooltip"
                                                   data-placement="top" data-original-title="Select Option"
                                                   tabindex="0">
                                                    Select Option
                                                </a>


                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1590569629435" class="shopify-section index-section">
        <div data-section-id="1590569629435" data-section-type="section-blog-v1" style="  ">
            <div class="section-blog-v1 ">
                <div class="container container-v2">

                    <div class="text-center ">
                        <h3 class="title_heading mb-0">Our Blog</h3>
                    </div>

                    <div class="row js-blog-v1 content-blog-v1 slick-initialized slick-slider">


                        <div aria-live="polite" class="slick-list draggable">
                            <div class="slick-track"
                                 style="opacity: 1; width: 5760px; transform: translate3d(-1440px, 0px, 0px);"
                                 role="listbox">
                                <div class="col-12 slick-slide slick-cloned" style="width: 480px;" data-slick-index="-3"
                                     aria-hidden="true" tabindex="-1">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/five-things-friday.html" class="image_url"
                                               tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog5_1024x1024.jpg?v=1594692359"
                                                    alt="Five Things Friday" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a href="blogs/news/five-things-friday.html"
                                                                           tabindex="-1">Five
                                                    Things Friday</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-cloned" style="width: 480px;" data-slick-index="-2"
                                     aria-hidden="true" tabindex="-1">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/low-to-high-wood-nightstands.html" class="image_url"
                                               tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog4_1024x1024.jpg?v=1594692276"
                                                    alt="Low to High: Wood Nightstands" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/low-to-high-wood-nightstands.html" tabindex="-1">Low
                                                    to High: Wood
                                                    Nightstands</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-cloned" style="width: 480px;" data-slick-index="-1"
                                     aria-hidden="true" tabindex="-1">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/a-new-kind-of-hybrid-flexibility-with-flexfit-t8s.html"
                                               class="image_url" tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog3_1024x1024.jpg?v=1594634331"
                                                    alt="A new kind of hybrid flexibility with FlexFit T8s"
                                                    class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/a-new-kind-of-hybrid-flexibility-with-flexfit-t8s.html"
                                                    tabindex="-1">A
                                                    new kind of hybrid flexibility with FlexFit T8s</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-current slick-active" style="width: 480px;"
                                     data-slick-index="0" aria-hidden="false" tabindex="-1" role="option"
                                     aria-describedby="slick-slide30">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/our-favorite-greige-colors.html" class="image_url"
                                               tabindex="0">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog8_1024x1024.jpg?v=1594692741"
                                                    alt="Our Favorite Greige Colors" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="0">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/our-favorite-greige-colors.html" tabindex="0">Our
                                                    Favorite Greige
                                                    Colors</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-active" style="width: 480px;" data-slick-index="1"
                                     aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide31">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/table-lamps-high-to-low.html" class="image_url"
                                               tabindex="0">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog7_1024x1024.jpg?v=1594692636"
                                                    alt="Table Lamps High to Low" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="0">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/table-lamps-high-to-low.html" tabindex="0">Table
                                                    Lamps High to Low</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-active" style="width: 480px;" data-slick-index="2"
                                     aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide32">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/trend-we-are-loving-fluted-details.html"
                                               class="image_url" tabindex="0">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog6_1024x1024.jpg?v=1594692568"
                                                    alt="Trend We Are Loving: Fluted Details"
                                                    class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="0">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/trend-we-are-loving-fluted-details.html"
                                                    tabindex="0">Trend We Are
                                                    Loving: Fluted Details</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide" style="width: 480px;" data-slick-index="3"
                                     aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide33">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/five-things-friday.html" class="image_url"
                                               tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog5_1024x1024.jpg?v=1594692359"
                                                    alt="Five Things Friday" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a href="blogs/news/five-things-friday.html"
                                                                           tabindex="-1">Five
                                                    Things Friday</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide" style="width: 480px;" data-slick-index="4"
                                     aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide34">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/low-to-high-wood-nightstands.html" class="image_url"
                                               tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog4_1024x1024.jpg?v=1594692276"
                                                    alt="Low to High: Wood Nightstands" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/low-to-high-wood-nightstands.html" tabindex="-1">Low
                                                    to High: Wood
                                                    Nightstands</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide" style="width: 480px;" data-slick-index="5"
                                     aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide35">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/a-new-kind-of-hybrid-flexibility-with-flexfit-t8s.html"
                                               class="image_url" tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog3_1024x1024.jpg?v=1594634331"
                                                    alt="A new kind of hybrid flexibility with FlexFit T8s"
                                                    class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/a-new-kind-of-hybrid-flexibility-with-flexfit-t8s.html"
                                                    tabindex="-1">A
                                                    new kind of hybrid flexibility with FlexFit T8s</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-cloned" style="width: 480px;" data-slick-index="6"
                                     aria-hidden="true" tabindex="-1">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/our-favorite-greige-colors.html" class="image_url"
                                               tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog8_1024x1024.jpg?v=1594692741"
                                                    alt="Our Favorite Greige Colors" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/our-favorite-greige-colors.html" tabindex="-1">Our
                                                    Favorite Greige
                                                    Colors</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-cloned" style="width: 480px;" data-slick-index="7"
                                     aria-hidden="true" tabindex="-1">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/table-lamps-high-to-low.html" class="image_url"
                                               tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog7_1024x1024.jpg?v=1594692636"
                                                    alt="Table Lamps High to Low" class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/table-lamps-high-to-low.html" tabindex="-1">Table
                                                    Lamps High to Low</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 slick-slide slick-cloned" style="width: 480px;" data-slick-index="8"
                                     aria-hidden="true" tabindex="-1">
                                    <div class="content-section-blog-v1">
                                        <div class="picrure">
                                            <a href="blogs/news/trend-we-are-loving-fluted-details.html"
                                               class="image_url" tabindex="-1">
                                                <img
                                                    data-src="//alamp-store-demo.myshopify.com/cdn/shop/articles/blog6_1024x1024.jpg?v=1594692568"
                                                    alt="Trend We Are Loving: Fluted Details"
                                                    class="lazyload img-fluid">
                                            </a>

                                            <div class="date">
                                                <span class="day"> 13</span>
                                                <span class="month">Jul</span>
                                            </div>

                                        </div>

                                        <div class="info_blog">

                                            <a class="blog_cate" href="blogs/news.html" tabindex="-1">News</a>


                                            <h4 class="mb-0 title-blog"><a
                                                    href="blogs/news/trend-we-are-loving-fluted-details.html"
                                                    tabindex="-1">Trend We Are
                                                    Loving: Fluted Details</a></h4>


                                            <p class="content mb-0">
                                                This time of the year brings cooler weather, shorter days, cocooning on
                                                the
                                                couch, Netflix bingeing, and indoor projects and crafts. Maybe...
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1594806551188" class="shopify-section">
        <div data-section-id="1594806551188" data-section-type="section-instagram-v3" style=" ">
            <div class="section-instagram-v3 mt-all">


                <script>
                    jQuery(document).ready(function ($) {
                        function engo_insv2() {
                            $('.js-instagram').slick({
                                arrows: true,
                                dots: false,
                                infinite: false,
                                autoplay: true,
                                slidesToShow: 5,
                                slidesToScroll: 1,
                                prevArrow: '<button type="button" class="prev-slide"><i class="fa fa-angle-left"></i></button>',
                                nextArrow: '<button type="button" class="next-slide"><i class="fa fa-angle-right"></i></button>',
                                responsive: [
                                    {
                                        breakpoint: 1600,
                                        settings: {
                                            slidesToShow: 4,
                                            slidesToScroll: 1
                                        }
                                    },
                                    {
                                        breakpoint: 1199,
                                        settings: {
                                            slidesToShow: 4,
                                            slidesToScroll: 1
                                        }
                                    },
                                    {
                                        breakpoint: 1024,
                                        settings: {
                                            slidesToShow: 3,
                                            slidesToScroll: 1
                                        }
                                    },
                                    {
                                        breakpoint: 600,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 1
                                        }
                                    }
                                ]
                            });
                        }

                        engo_insv2();
                    });
                </script>


                <div class="instagram_v2 center">
                    <div class="text-center  text_top">
                        <h3 class="title_insta title_heading">Alamp On Instagram</h3>
                        <a class="des_insta text-center">@alamp</a>
                    </div>
                    <div class="js-instagram galary_inta slick-initialized slick-slider"
                         id="engoj_section_instagram_v2">
                        <button type="button" class="prev-slide slick-arrow" aria-disabled="false" style=""><i
                                class="fa fa-angle-left"></i></button>


                        <div aria-live="polite" class="slick-list draggable">
                            <div class="slick-track"
                                 style="opacity: 1; width: 2160px; transform: translate3d(-720px, 0px, 0px);"
                                 role="listbox">
                                <div class="content relative hover-images slick-slide" style="width: 360px;"
                                     data-slick-index="0" aria-hidden="true" tabindex="-1" role="option"
                                     aria-describedby="slick-slide00">
                                    <img src="cdn/shop/files/instagram12df4.jpg?v=4725951516259854932"
                                         class="img-responsive" alt="instagram">
                                    <div class="absolute content_text flex center">
                                        <a href="https://www.instagram.com/" class="delay03 inline-block"
                                           target="_blank" tabindex="-1"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="content relative hover-images slick-slide" style="width: 360px;"
                                     data-slick-index="1" aria-hidden="true" tabindex="-1" role="option"
                                     aria-describedby="slick-slide01">
                                    <img src="cdn/shop/files/instagram21c7a.jpg?v=13268212331036541767"
                                         class="img-responsive" alt="instagram">
                                    <div class="absolute content_text flex center">
                                        <a href="https://www.instagram.com/" class="delay03 inline-block"
                                           target="_blank" tabindex="-1"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="content relative hover-images slick-slide slick-current slick-active"
                                     style="width: 360px;" data-slick-index="2" aria-hidden="false" tabindex="-1"
                                     role="option" aria-describedby="slick-slide02">
                                    <img src="cdn/shop/files/instagram359c5.jpg?v=111651343351485265"
                                         class="img-responsive" alt="instagram">
                                    <div class="absolute content_text flex center">
                                        <a href="https://www.instagram.com/" class="delay03 inline-block"
                                           target="_blank" tabindex="0"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="content relative hover-images slick-slide slick-active"
                                     style="width: 360px;" data-slick-index="3" aria-hidden="false" tabindex="-1"
                                     role="option" aria-describedby="slick-slide03">
                                    <img src="cdn/shop/files/instagram48568.jpg?v=6643629408387033290"
                                         class="img-responsive" alt="instagram">
                                    <div class="absolute content_text flex center">
                                        <a href="https://www.instagram.com/" class="delay03 inline-block"
                                           target="_blank" tabindex="0"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="content relative hover-images slick-slide slick-active"
                                     style="width: 360px;" data-slick-index="4" aria-hidden="false" tabindex="-1"
                                     role="option" aria-describedby="slick-slide04">
                                    <img src="cdn/shop/files/instagram5b846.jpg?v=5532890164363870778"
                                         class="img-responsive" alt="instagram">
                                    <div class="absolute content_text flex center">
                                        <a href="https://www.instagram.com/" class="delay03 inline-block"
                                           target="_blank" tabindex="0"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="content relative hover-images slick-slide slick-active"
                                     style="width: 360px;" data-slick-index="5" aria-hidden="false" tabindex="-1"
                                     role="option" aria-describedby="slick-slide05">
                                    <img src="cdn/shop/files/instagram66c94.jpg?v=6309454069196959781"
                                         class="img-responsive" alt="instagram">
                                    <div class="absolute content_text flex center">
                                        <a href="https://www.instagram.com/" class="delay03 inline-block"
                                           target="_blank" tabindex="0"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="next-slide slick-arrow slick-disabled" style=""
                                aria-disabled="true"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END content_for_index -->
@endsection
