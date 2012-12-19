<?php
/*
 * CurtisAndRebecca.com
 * wedding/content.php
 * Copyright 2009 Curtis Free and Rebecca Drake. All rights reserved.
 */

    # Defines
    define("CONTENT_DIR", "content/"); // content directory
    define("CF_HOME",     "home");     // home/index content file
    define("CF_404",      "404");      // 404 content file
    define("REQ_PAGE",    "page");     // content page request parameter
    define("INDENT",      "      ");   // content indentation

    # Content Scripting

    error_reporting(0); // disable error reporting

    // initially choose the homepage content file
    $content_file = CF_HOME;

    // if another page was given in the URL, select it
    if (isset($_REQUEST[REQ_PAGE]) && !empty($_REQUEST[REQ_PAGE])) {
        $content_file = get_filename($_REQUEST[REQ_PAGE]);
    }

    // if an invalid page has been requested, use a 404 error page
    if (!file_exists(CONTENT_DIR . $content_file)) {
        $content_file = CF_404;
    }

    // procure the lines of content
    $content_lines = file(CONTENT_DIR . $content_file);

    // this flag will be set to true while inside preformatted text blocks
    $preformatted = false;

    // echo each line of the content, preceded by the proper indentation
    foreach ($content_lines as $line) {

        // turn on preformatting before echoing the <pre> tag
        if (ereg("<pre(>| .*>)", $line)) {
            $preformatted = true;
        }

        // only echo the indentation if not inside a preformatted block
        if (!$preformatted) {
            echo INDENT;
        }

        // echo the line contents
        echo $line;

        // turn off preformatting after echoing the </pre> tag
        if (ereg("</pre>", $line)) {
            $preformatted = false;
        }
    }

    # Utility Functions

    /**
     * Procures a content file name from the given page name.
     *
     * @param page The page name as given in the request parameter.
     * @return Returns the name of the file that should contain the requested content.
     */
    function get_filename($page) {
        // somedir/somefile -> somedir.somefile
        return str_replace("/", ".", $page);
    }

?>
