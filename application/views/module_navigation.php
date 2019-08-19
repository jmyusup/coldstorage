<?php $uri1 = $this->uri->segment(1); ?>

<li>
    <a <?=($uri1 == 'home') ? "class=\"active\"" : ""; ?> href="{base_url}home"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Home</a>
</li>
<?php if($user_permission == 1 || $user_permission == 2){ ?>
<li <?=($uri1 == 'mmaterial') ? "class=\"open\"" : ""; ?>>
    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Master Data</span></a>
    <ul>
        <li>
            <a <?=($uri1 == 'mmaterial') ? "class=\"active\"" : ""; ?> href="{base_url}mmaterial">Material</a>
        </li>
    </ul>
</li>
<? } ?>
<li <?=($uri1 == 'linforuangan') ? "class=\"open\"" : ""; ?>>
    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Laporan</span></a>
    <ul>
        <?php if($user_permission == 1 || $user_permission == 2){ ?>
        <li>
            <a <?=($uri1 == 'linforuangan') ? "class=\"active\"" : ""; ?> href="{base_url}linforuangan">Informasi Ruangan</a>
        </li>
        <? } ?>
    </ul>
</li>
<?php if($user_permission == 1){ ?>
<li>
    <a <?=($uri1 == 'musers') ? "class=\"active\"" : ""; ?> href="{base_url}musers"><i class="si si-users"></i><span class="sidebar-mini-hide">Users</a>
</li>
<? } ?>
