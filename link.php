<?php
require('view/sub/'.filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING).'.php');
