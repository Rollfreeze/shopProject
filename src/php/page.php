<?php

abstract class AbstractPage
{
    protected $pageTitle;

    public function __construct($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    protected function head() {
        $head = <<<HEAD
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <title>$this->pageTitle</title>
        </head>
HEAD;
        return $head;
    }

    protected function HTMLStart() {
        $htmlStart = <<<HTML_START
        <!DOCTYPE html>
        <html lang="en">
HTML_START;

        return $htmlStart;
    }

    protected function HTMLEnd() {
        $htmlEnd = <<<HTML_END
        </html>
HTML_END;

        return $htmlEnd;
    }

    protected function body() {}


    /// Верстка страницы
    public function layOutBuild() {
        echo $this->HTMLStart();
        echo $this->head();
        echo '<body>';

        echo $this->body();

        echo '</body>';
        echo $this->HTMLEnd();
    }
}