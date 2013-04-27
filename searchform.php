<form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
    <div class="row collapse">
        <div class="small-10 columns">
            <input type="text" name="s" id="s" value="" placeholder="Search..." />
        </div>
        <div class="small-2 columns">
            <button type="submit" id="searchsubmit" class="button secondary search prefix" value="Search">
                <i class="icon-search"></i>
            </button>
        </div>
    </div>
</form>