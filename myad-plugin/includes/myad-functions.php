<?php

/*
* Set of functions for MyAd plugin
*/

// Hook 'the_content' filter-hook, on 'myad_insert_ad_in_post' filter function 
add_filter( 'the_content', 'myad_insert_ad_in_post' );
   
function myad_insert_ad_in_post( $content ) {
    
    //ad_code variable contains the code generated from an ad generator (e.g goodle ad manager)
    $ad_code = "<html>
              <head>
                <meta charset='utf-8'>
                <title>Google Chrome Ad</title>
                <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
                <script>
                  window.googletag = window.googletag || {cmd: []};
                  googletag.cmd.push(function() {
                    googletag
                        .defineSlot(
                            '/6355419/Travel/Europe/France/Paris', [300, 250], 'banner-ad')
                        .addService(googletag.pubads());
                    googletag.enableServices();
                  });
                </script>
              </head>
              <body>
                <div id='banner-ad' style='width: 300px; height: 250px;'>
                  <script>
                    googletag.cmd.push(function() {
                      googletag.display('banner-ad');
                    });
                  </script>
                </div>
              </body>
            </html>";

    // index of paragraph we choose to work with
    $paragraph_num = 2; 

    if ( is_single() && ! is_admin()) {
        return myad_insert_ad_after_paragraph( $ad_code, $paragraph_num, $content );
    }
        
    return $content;
}

/* Function that trims '$content' contents on delimiter into an array 
* and concatenates the '$ad_code' (i.e the google test ad) after the array element
* with index equal to '$paragraph_num'
*/
function myad_insert_ad_after_paragraph( $ad_code, $paragraph_num, $content ) {
  
  $paragraph_delimiter = '</p>';
  $paragraphs = explode( $paragraph_delimiter, $content );
  
  foreach ($paragraphs as $index => $paragraph) {

      if ( trim( $paragraph ) ) {
          $paragraphs[$index] .= $paragraph_delimiter;
      }

      if ( $paragraph_num == $index + 1 ) {
          $paragraphs[$index] .= $ad_code;
      }
  }
   
  return implode( '', $paragraphs );
}