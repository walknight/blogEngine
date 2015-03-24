        <div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" href="#">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="../index.html">RWM</a>
				<div class="nav-collapse">
					<ul class="nav">
						<?php
                        if (($navigation = $this->navigation_library->get_nav())):
                            foreach ($navigation as $navigation_item): ?>
                            <li><a href="<?php echo site_url($navigation_item['url']) ?>" title="<?php echo $navigation_item['title']; ?>"><span><?php echo $navigation_item['title']; ?></span></a>
                            <?php
                            //load sub navigation
                            if($sub_nav = $this->navigation_library->get_nav($navigation_item['id']))
                            {
                                echo "<ul>\n";
                                foreach($sub_nav as $sub_nav_item):?>
                                <li><a href="<?php echo site_url($sub_nav_item['url']) ?>" title="<?php echo $sub_nav_item['title']; ?>"><?php echo $sub_nav_item['title']; ?></a></li>
                                <?php
                                endforeach;
                                 echo "</ul></li>\n";
                            } else {
                                echo "</li>\n";
                            }
                            ?>
                             <?php endforeach; ?>
                        <?php endif; ?>
					</ul>
					<form class="navbar-form form-search pull-right">
						<input id="Search" name="Search" type="text" placeholder="type text to search for" class="input-medium search-query">
						<button type="submit" class="btn">Search</button>
					</form>
				</div>
			</div>
		</div>
