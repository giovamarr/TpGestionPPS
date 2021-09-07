<div class="col-xs-3  text-primary">
    <div class="dropdown ">
        <a class="nav-link dropdown-toggle px-2  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="true">
            <span class="d-inline align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill " viewBox="0 0 16 9">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg> <?php echo $_SESSION['name'] . ' ' . $_SESSION['ape'] ?>
            </span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../../app/controllers/logout.php">Cerrar Sesion</a></li>
        </ul>
    </div>