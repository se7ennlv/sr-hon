
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="#" data-toggle="modal" data-target="#configModal">
                    <span class="glyphicon glyphicon-cog" data-toggle="tooltip" data-placement="bottom" title="Config"></span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a><span class="glyphicon glyphicon-oil"></span> DEPT:</a></li>
            <li id="deptIDs" style="display: none">
                <a>
                    <?php
                    if (isset($_COOKIE["deptID"])) {
                        echo $_COOKIE["deptID"];
                    }
                    ?>
                </a>
            </li>
            <li>
                <a id="deptName">
                    <?php
                    if (isset($_COOKIE["getDeptName"])) {
                        echo $_COOKIE["getDeptName"];
                    }
                    ?>
                </a>
            </li>
            <li><a><span class="glyphicon glyphicon-map-marker"></span> Location:</a></li>
            <li id="locaIDs" style="display: none">
                <a>
                    <?php
                    if (isset($_COOKIE["locaID"])) {
                        echo $_COOKIE["locaID"];
                    }
                    ?>
                </a>
            </li>
            <li>
                <a id="locaName">
                    <?php
                    if (isset($_COOKIE["getLocaName"])) {
                        echo $_COOKIE["getLocaName"];
                    }
                    ?>
                </a>
            </li>
            
            <li><a href="#" onclick="th()">ภาษาไทย</a></li>
            <li><a href="#" onclick="us()">English</a></li>
        </ul>
    </div>
</nav>