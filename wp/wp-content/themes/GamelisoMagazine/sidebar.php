<div id="right-column">
<div class="sidebar">

    <?php if (!function_exists('dynamic_sidebar')
	|| !dynamic_sidebar()) : ?>

    <div class="widget-top"></div>
    <div class="widget">
    <h3>Pages</h3>
    <ul><?php wp_list_pages('title_li=' ); ?></ul>
    </div>
    <div class="widget-bot"></div>

    <div class="widget-top"></div>
    <div class="widget">
    <h3>Categories</h3>
    <ul>
    <?php wp_list_categories('title_li=' ); ?>
    </ul>
    </div>
    <div class="widget-bot"></div>


    <?php endif; ?>
</div>

<div class="sidebar">

    <?php if (!function_exists('dynamic_sidebar')
	|| !dynamic_sidebar(2)) : ?>

    <div class="widget-top"></div>
    <div class="widget">
    <h3>Pages</h3>
    <ul><?php wp_list_pages('title_li=' ); ?></ul>
    </div>
    <div class="widget-bot"></div>

    <div class="widget-top"></div>
    <div class="widget">
    <h3>Categories</h3>
    <ul>
    <?php wp_list_categories('title_li=' ); ?>
    </ul>
    </div>
    <div class="widget-bot"></div>


    <?php endif; ?>
</div>
</div>