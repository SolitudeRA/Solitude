<?php

get_template_part("template-parts/header/header", "index");

get_sidebar("left");

get_template_part("template-parts/index/index", "title");

get_template_part("template-parts/index/index", "content");

get_sidebar("bottom");

get_template_part("template-parts/footer/footer", "index");

