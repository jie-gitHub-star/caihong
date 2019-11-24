<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">WZ Project</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li>
                        <a href="#">主页</a>
                    </li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-search pull-left" action="">
                    <input type="text" class="search-query span2" placeholder="Search" />
                </form>
                <ul class="nav pull-right">
                    <li>
                        <a href="profile.htm">@<?= @$_SESSION['user']['username'] ?></a>
                    </li>
                    <li>
                        <a href="<?= url('login/index') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>