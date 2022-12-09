<?php

use function PHPSTORM_META\type;

define("THEME_SUPER_ADMIN", "3");
define("THEME_ADMIN", "5");
define("THEME_FORMER", "7");
define("THEME_USER",     "9");
define("THEME_COMPANY",   "11");

/*********************ACCUEIL*****************/

// indicateur carousel
function indicatorCarousel($index, $count)
{
    $str = "<div class='carousel-indicators'>";

    for ($i = 0; $i < $count; $i++) {
        $active = ($i == $index) ? "class='active' aria-current='true'" : "";
        $str .= " <button type='button' data-bs-target='#carouselCaptions' data-bs-slide-to='$i' $active aria-label='Slide" . ($i + 1) . "'></button>";
    }
    $str .= "</div>";
    return $str;
}

// éléments du carousel
function listCarousel($index = 0)
{
    $base = base_url();
    $list = [
        [
            "url_image" => $base . "/assets/img/img1.jpg",
            "title" => "Débutant",
            "description" => "Vous débutez...",
        ],
        [
            "url_image" => $base . "/assets/img/img2.jpg",
            "title" => "Avancé",
            "description" => "Vous avancez...",
        ],
        [
            "url_image" => $base . "/assets/img/img3.jpg",
            "title" => "Entreprise",
            "description" => "Vous êtes un entreprise...",
        ],
    ];
    $i = 0;

    $str = indicatorCarousel($index, count($list));

    $str .= "<div class='carousel-inner'>";
    foreach ($list as $item) {
        $active = ($i == $index) ? "active" : "";
        $str .= "<div class='carousel-item " . $active . " '' >";
        $str .= "<img src='" . $item['url_image'] . "' class='d-block w-100' alt='...'>";
        $str .= "<div class='carousel-caption d-none d-md-block'>";
        $str .= "<h5>" . $item['title'] . "</h5>";
        $str .= "<p>" . $item['description'] . "</p>";
        $str .= "</div>";
        $str .= "</div>";
        $i++;
    }
    $str .= "</div>";
    return $str;
}

/*********************************************/
// Les profils utilisateur
function createOptionType($select=0)
{
    $types = ["Vous êtes", "Formateur", "Entreprise","Particulier" ];
    $selected_index=array_search($select,$types);
    $options = "";
    $index = 1;
    foreach ($types as $type) {
        $selected=($index == $selected_index)?"selected":"";
        $options .= "<option value='$index' $selected >$type</option>";
        $index++;
    }
    return $options;
}


/*********************PROFILS*****************/

// Privilèges
function powers($number, $max = 100, $show = 5)
{
    if ($number > $max) {
        $number = $max;
    }
    if ($number < 0) {
        $number = 0;
    }
    $number = $number / ($max / $show);
    $max = $max / ($max / $show);
    $str = "";
    for ($i = 0; $i < $max; $i++) {
        $str .= ($i < $number) ? "<i class='bi bi-trophy-fill'></i>" : "<i class='bi bi-trophy'></i>";
    }
    return $str;
}
// Popularité
function ratings($number, $max = 10)
{
    if ($number > $max) {
        $number = $max;
    }
    if ($number < 0) {
        $number = 0;
    }
    $number = $number / ($max / 5);
    $max = $max / ($max / 5);
    $str = "";
    for ($i = 0; $i < $max; $i++) {
        $str .= ($i < $number) ? "<i class='bi bi-star-fill'></i>" : "<i class='bi bi-star'></i>";
    }
    return $str;
}
// Formatage des dates
function dateFormat($date)
{
    $strDate = "Aucune date renseignée";
    if ($date == null) {
    } else {
        $data = explode('-', $date);
        $strDate = $data[2] . " " . getMonth($data[1]) . " " . $data[0];
    }
    return $strDate;
}
// Le mois en format texte
function getMonth($month)
{
    $strMonth = "";
    switch (intVal($month)) {
        case 1:
            $strMonth = "Janvier";
            break;
        case 2:
            $strMonth = "Février";
            break;
        case 3:
            $strMonth = "Mars";
            break;
        case 4:
            $strMonth = "Avril";
            break;
        case 5:
            $strMonth = "Mai";
            break;
        case 6:
            $strMonth = "Juin";
            break;
        case 7:
            $strMonth = "Juillet";
            break;
        case 8:
            $strMonth = "Août";
            break;
        case 9:
            $strMonth = "Septembre";
            break;
        case 10:
            $strMonth = "Octobre";
            break;
        case 11:
            $strMonth = "Novembre";
            break;
        case 12:
            $strMonth = "Décembre";
            break;
    }
    return $strMonth;
}
// Le genre de l'utilisateur
function getGender($gender)
{
    if ($gender == null) {
        return "Non renseigné";
    }
    return ($gender == 1) ? "Masculin" : "Féminin";
}

// Menu 
function fillMenuDashBoard($type)
{
    $menu = "";
    switch ($type) {
        case THEME_USER:
            $menu .= fillMenu2("Accueil", "#", "Accueil", $type);
            $menu .= fillMenu("Profil", "menu1", "Profil", $type);
            $menu .= fillMenu("Formations", "menu2", "Formations", $type);
            $menu .= fillMenu2("Factures", "#", "Factures", $type);
            break;

        case THEME_COMPANY:
            $menu .= fillMenu2("Accueil", "#", "Accueil", $type);
            $menu .= fillMenu("Profil", "menu1", "Profil", $type);
            $menu .= fillMenu("Formations", "menu2", "Formations", $type);
            $menu .= fillMenu2("Factures", "#", "Factures", $type);
            break;

        case THEME_FORMER:
            $menu .= fillMenu2("Accueil", "#", "Accueil", $type);
            $menu .= fillMenu("Profil", "menu1", "Profil", $type);
            $menu .= fillMenu("Formations", "menu2", "Formations", $type);
            $menu .= fillMenu("Clients", "menu3", "Clients", $type);
            $menu .= fillMenu2("Factures", "#", "Factures", $type);
            break;

        case THEME_ADMIN:
            $menu .= fillMenu2("Accueil", "/login", "Accueil", $type);
            $menu .= fillMenu("Profil", "menu1", "Profil", $type);
            $menu .= fillMenu("Tableau de bord", "menu2", "Privileges", $type);
            $menu .= fillMenu("Formations", "menu3", "Formations", $type);
            $menu .= fillMenu("Formateurs", "menu4", "Formateurs", $type);
            $menu .= fillMenu("Média", "menu5", "Media", $type);
            $menu .= fillMenu("Clients", "menu6", "Clients", $type);
            $menu .= fillMenu2("Factures", "#", "Factures", $type);
            break;

        case THEME_SUPER_ADMIN:
            $menu .= fillMenu2("Accueil", "/superadmin/profil", "Accueil", $type);
            $menu .= fillMenu("Profil", "menu1", "Profil", $type);
            $menu .= fillMenu("Tableau de bord", "menu2", "Privileges", $type);
            $menu .= fillMenu("Formations", "menu3", "Formations", $type);
            $menu .= fillMenu("Formateurs", "menu4", "Formateurs", $type);
            $menu .= fillMenu("Média", "menu5", "Media", $type);
            $menu .= fillMenu("Clients", "menu6", "Clients", $type);
            $menu .= fillMenu2("Factures", "#", "Factures", $type);
            break;
    }
    return $menu;
}
// Icones en fonction des catégories
function getIcon($category)
{
    switch ($category) {

        case "Accueil":
            $icon = "bi-house";
            break;
        case "Profil":
            $icon = "bi-speedometer2";
            break;
        case "Formations":
            $icon = "bi-book";
            break;
        case "Media":
            $icon = "bi-grid";
            break;
        case "Clients":
            $icon = "bi-people";
            break;
        case "Formateurs":
            $icon = "bi-mortarboard";
            break;
        case "Privileges":
            $icon = "bi-stoplights";
            break;
        case "Factures":
            $icon = "bi-currency-euro";
            break;
    }
    return $icon;
}


/* remplit les categories du menu latéral gauche */
function fillMenuRight($category, $type)
{
    switch ($category) {

        case "Media":
            $items = [
                ["ref" => "", "name" => "Vidéos"],
                ["ref" => "", "name" => "Livres"],
                ["ref" => "", "name" => "Produits"],
            ];
            break;

        case "Profil":
            switch ($type) {
                case THEME_USER:
                    $items = [
                        ["ref" => "", "name" => "Nom - Mot de passe"],
                        ["ref" => "", "name" => "Informations contact"],
                    ];
                    break;
                case THEME_COMPANY:
                    $items = [
                        ["ref" => "", "name" => "Nom - Mot de passe"],
                        ["ref" => "", "name" => "Informations contact"],
                        ["ref" => "", "name" => "Travail"],
                    ];
                    break;
                default:
                    $items = [
                        ["ref" => "", "name" => "Nom - Mot de passe"],
                        ["ref" => "", "name" => "Informations contact"],
                        ["ref" => "", "name" => "Travail"],
                        ["ref" => "", "name" => "Compétences"],
                    ];
                    break;
            }
            break;

        case "Clients":
            $items = [
                ["ref" => "", "name" => "Particulier"],
                ["ref" => "", "name" => "Entreprise"],
            ];
            break;

        case "Formations":
            $items = [
                ["ref" => "", "name" => "Liste"],
                ["ref" => "", "name" => "Filtre"],
            ];
            break;

        case "Formateurs":
            $items = [
                ["ref" => "", "name" => "Liste"],
                ["ref" => "", "name" => "Filtre"],
            ];
            break;

        case "Privileges":
            switch ($type) {
                case THEME_ADMIN:
                    $items = [
                        ["ref" => "", "name" => "Permissions"],
                    ];
                    break;
                case THEME_SUPER_ADMIN:
                    $items = [
                        ["ref" => "/superadmin/add/admin", "name" => "+ Administrateur"],
                        ["ref" => "/superadmin/privileges", "name" => "Permissions"],
                    ];
                    break;
            }
            break;
    }
    $str = "";
    foreach ($items as $item) {
        $str .= "<li class='w-100 '>\n";
        $str .= "<a href='" . $item['ref'] . "' class='nav-link " . getTextColor($type) . " px-0'>" . $item['name'] . "</a>\n";
        $str .= "</li>\n";
    }
    return $str;
}

function fillMenu($title, $id, $category, $type)
{
    $str = "<li>";
    $str .= "<a href='#" . $id . "' data-bs-toggle='collapse' class='nav-link px-0 align-middle " . getTextColor($type) . " '>";
    $str .=  "<i class='fs-4 " . getIcon($category) . " '></i> <span class='ms-1 d-none d-sm-inline'>" . $title . "</span></a>";
    $str .= "<ul class='collapse  nav flex-column ms-1' id='" . $id . "' data-bs-parent='#menu'>";
    $str .= fillMenuRight($category, $type);
    $str .= "     </ul>
    </li>";
    return $str;
}

function fillMenu2($title, $action, $category, $type)
{
    $str = "<li>
    <a href='" . $action . "' class='nav-link px-0 align-middle " . getTextColor($type) . "'>
        <i class='fs-4 " . getIcon($category) . "'></i> <span class='ms-1 d-none d-sm-inline'>" . $title . "</span></a>
    </li>";
    return $str;
}

// Menu de navigation du haut
function fillMenuNav($category = "News")
{
    switch ($category) {

        case "News":
            $items = [
                ["ref" => "", "name" => "Articles"],
                ["ref" => "", "name" => "Publications"],
                ["ref" => "", "name" => "-"],
                ["ref" => "", "name" => "Vidéos"],
                ["ref" => "", "name" => "Livres"],
            ];
            break;

        case "About":
            $items = [
                ["ref" => "", "name" => "Nos formateurs"],
                ["ref" => "", "name" => "Nos formations"],
                ["ref" => "", "name" => "Mon financement"],
            ];
            break;
    }

    $str = "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>\n";
    foreach ($items as $item) {
        $str .= "<li class='w-100'>\n";
        if ($item['name'] == "-") {
            $str .= "<hr class='dropdown-divider'>";
        } else {
            $str .= "<a href='" . $item['ref'] . "' class='dropdown-item'>" . $item['name'] . "</a>\n";
        }
        $str .= "</li>\n";
    }
    $str .= "</ul>";
    return $str;
}

// On change le footer
function changeFooterTheme($type, $navbar = true, $dark = true)
{
    $theme = ($navbar == true) ? "navbar" : "";
    if (!empty($theme)) {
        $theme .= ($dark == true) ? "-dark" : "-light";
    }

    switch ($type) {
        case THEME_USER: // Particulier
            $theme .= " f-blue";
            break;

        case THEME_COMPANY: // Entreprise
            $theme .= " f-blue2";
            break;

        case THEME_ADMIN: //Administrateur
            $theme = " f-yellow";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme .= " f-velvet";
            break;

        case THEME_FORMER: // Formateur
            $theme .= " f-green";
            break;

        default: // par défaut
            $theme .= " f-dark";
            break;
    }
    return $theme;
}

function changeMenuTheme($type, $navbar = true, $dark = true)
{
    $theme = ($navbar == true) ? "navbar" : "";
    if (!empty($theme)) {
        $theme .= ($dark == true) ? "-dark" : "-light";
    }
    $theme .= " menu-";

    switch ($type) {
        case THEME_USER: // Particulier
            $theme .= "bg-blue";
            break;

        case THEME_COMPANY: // Entreprise
            $theme .= "bg-blue2";
            break;

        case THEME_ADMIN: //Administrateur
            $theme = "bg-yellow";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme .= "bg-velvet";
            break;

        case THEME_FORMER: // Formateur
            $theme .= "bg-green";
            break;

        default: // par défaut
            $theme .= "bg-dark";
            break;
    }
    return $theme;
}
// On change le theme pour le menu et le footer
function changeMainTheme($type, $navbar = true, $dark = true)
{;
    $theme = ($navbar == true) ? "navbar" : "";
    if (!empty($theme)) {
        $theme .= ($dark == true) ? "-dark" : "-light";
    }

    switch ($type) {
        case THEME_USER: // Particulier
            $theme .= " bg-blue";
            break;

        case THEME_COMPANY: // Entreprise
            $theme .= " bg-blue2";
            break;

        case THEME_ADMIN: //Administrateur
            $theme = " bg-yellow";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme .= " bg-velvet";
            break;

        case THEME_FORMER: // Formateur
            $theme .= " bg-green";
            break;

        default: // par défaut
            $theme .= " bg-dark";
            break;
    }
    return $theme;
}


function getTextColor($type)
{
    $theme = "";

    switch ($type) {
        case THEME_USER: // Particulier
            $theme = "text-white";
            break;

        case THEME_COMPANY: // Entreprise
            $theme = "text-white";
            break;

        case THEME_ADMIN: //Administrateur
            $theme = "text-white";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme = "text-white";
            break;

        case THEME_FORMER: // Formateur
            $theme = "text-white";
            break;

        default: // par défaut
            $theme = "text-white";
            break;
    }
    return $theme;
}

function getMenuButtonColor($type)
{
    $theme = "";

    switch ($type) {
        case THEME_USER: // Particulier
            $theme = "btn-menu-outline-1";
            break;

        case THEME_COMPANY: // Entreprise
            $theme = "btn-menu-outline-1";
            break;

        case THEME_ADMIN: //Administrateur
            $theme = "btn-menu-outline-1";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme = "btn-menu-outline-3";
            break;

        case THEME_FORMER: // Formateur
            $theme = "btn-menu-outline-2";
            break;

        default: // par défaut
            $theme = "btn-outline-primary";
            break;
    }
    return $theme;
}
function getButtonColor($type)
{
    $theme = "";

    switch ($type) {
        case THEME_USER: // Particulier
            $theme = "btn-outline-primary-1";
            break;

        case THEME_COMPANY: // Entreprise
            $theme = "btn-outline-primary-1";
            break;

        case THEME_ADMIN: //Administrateur
            $theme = "btn-outline-primary-1";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme = "btn-outline-primary-3";
            break;

        case THEME_FORMER: // Formateur
            $theme = "btn-outline-primary-2";
            break;

        default: // par défaut
            $theme = "btn-outline-primary";
            break;
    }
    return $theme;
}

function getLogoColor($type)
{
    $theme = "";

    switch ($type) {
        case THEME_USER: // Particulier
            $theme .= "logo3.png";
            break;

        case THEME_COMPANY: // Entreprise
            $theme .= "logo3.png";
            break;

        case THEME_ADMIN: //Administrateur
            $theme .= "logo2.png";
            break;

        case THEME_SUPER_ADMIN: // Super Administrateur
            $theme .= "logo2.png";
            break;

        case THEME_FORMER: // Formateur
            $theme = "logo1.png";
            break;

        default: // par défaut
            $theme = "logo.png";
            break;
    }
    return $theme;
}

// extractions des droits pour un utilisateur
function getRights($right)
{
    return explode(' ', $right);
}

define("FLAG_READ", 0x8);
define("FLAG_UPDATE", 0x4);
define("FLAG_DELETE", 0x2);
define("FLAG_EXPORT", 0x1);

// réprésentation des droits sous forme graphique
function translateRights($right)
{
    $first = $right[0];
    $second = $right[1];
    $icons = "<div style='display:flex;'>";

    if ($first & 1) {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Ajout'><i class='bi bi-plus-circle-fill'></i></div>";
    } else {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Ajout'><i class='bi bi-plus-circle'></i></div>";
    }
    $mask = base_convert($second, 16, 10);
    $icons .= "&nbsp";
    if ($mask & FLAG_READ) {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Lecture'><i class='bi bi-info-circle-fill'></i></div>";
    } else {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Lecture'><i class='bi bi-info-circle'></i></div>";
    }
    $icons .= "&nbsp";
    if ($mask & FLAG_UPDATE) {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Mise à jour'><i class='bi bi-check-circle-fill'></i></div>";
    } else {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Mise à jour'><i class='bi bi-check-circle'></i></div>";
    }
    $icons .= "&nbsp";
    if ($mask & FLAG_DELETE) {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Suppression'><i class='bi bi-dash-circle-fill'></i></div>";
    } else {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Suppression'><i class='bi bi-dash-circle'></i></div>";
    }
    $icons .= "&nbsp";
    if ($mask & FLAG_EXPORT) {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Exportation'><i class='bi bi-arrow-up-circle-fill'></i></div>";
    } else {
        $icons .= "<div data-bs-toggle='tooltip' data-bs-placement='bottom' title='Exportation'><i class='bi bi-arrow-up-circle'></i></div>";
    }
    $icons .= "</div>";
    return $icons;
}
