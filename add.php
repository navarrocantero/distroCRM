<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helper.php';
$errors = array();


if (!empty($_POST)) {
    $emptyImage = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/240px-No_image_available.svg.png";
    // required fields (NOT NULL SQL FIELDS)
    $name = trim(htmlspecialchars($_POST['distroName']));
    $description = trim(htmlspecialchars($_POST['description']));
    $web = trim(htmlspecialchars($_POST['main_page']));
    $ostype = trim(htmlspecialchars($_POST['ostype']));
    $status = trim(htmlspecialchars($_POST['status']));

    $basedon = trim(arrayToString((($_POST['basedon']) ?? array())));
    $origin = trim(arrayToString((($_POST['origin']) ?? array())));
    $architecture = trim(arrayToString((($_POST['architecture']) ?? array())));
    $desktop = trim(arrayToString((($_POST['desktop']) ?? array())));
    $category = trim(arrayToString((($_POST['category']) ?? array())));


    // nullable fields ( NULL SQL FIELDS)
    $version = trim(htmlspecialchars($_POST['version']) ?? "");
    $image = (trim(htmlspecialchars($_POST['image']) ?? ""));
    $forums = trim(htmlspecialchars($_POST['forums']) ?? "");
    $doc = trim(htmlspecialchars($_POST['doc']) ?? "");
    $error_tracker = trim(htmlspecialchars($_POST['error_tracker']));


    if ($name === "") {
        $errors['name']['required'] = "Name is required ";
    }
    if ($description === "") {
        $errors['description']['required'] = "Description is required";
    }
    if ($web === "") {
        $errors['web']['required'] = "Main page is required";
    }

    if ($ostype === "") {
        $errors['ostype']['required'] = "Os type is required";
    }

    if ($basedon === "") {
        $errors['basedon']['required'] = "Based on is required";
    }

    if ($origin === "") {
        $errors['origin']['required'] = "Origin is required";
    }

    if ($architecture === "") {
        $errors['architecture']['required'] = "Architecture is required";
    }

    if ($desktop === "") {
        $errors['desktop']['required'] = "Desktop is required";
    }

    if ($category === "") {
        $errors['category']['required'] = "Category is required";
    }
    if ($status === "") {
        $errors['status']['required'] = "Status is required";
    }


    if ($image === "") {
        $image = $emptyImage;
    }

    if (!empty($errors)) {
        print_r($errors);

    } else {
        $sql = "Insert into distro (name,description,main_page,ostype,based,origin,arch,desktop,category,status,VERSION,image,forums,doc,error_tracker)
        VALUES (:name ,:description, :main_page, :ostype,
        :based, :origin, :arch, :desktop, :category, :status, :version, :image, :forums, :doc, :error_tracker)";
        $result = $pdo->prepare($sql);
        $result->execute([
            'name' => $name,
            'description' => $description,
            'main_page' => $web,
            'ostype' => $ostype,
            'based' => $basedon,
            'origin' => $origin,
            'arch' => $architecture,
            'desktop' => $desktop,
            'category' => $category,
            'status' => $status,
            'version' => $version,
            'image' => $image,
            'forums' => $forums,
            'doc' => $doc,
            "error_tracker" => $error_tracker
        ]);
        header("location: index.php");
    }

}

?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Add New Distro</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/app.css"/>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DistroADA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse    ">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="add.php">Añadir Distro</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <h1>Add New Distro</h1>
    <form action="" method="post">

        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="distroName" name="distroName" placeholder="Distro Name">
        </div>
        <div class="form-group">
            <label for="inputImage">Image</label>
            <input type="text" class="form-control" id="inputImage" name="image" placeholder="Distro Image URL">
        </div>
        <div class="form-group">
            <label for="inputOsType">Os Type</label>
            <select class="form-control" name="ostype">
                <option value="Linux">Linux</option>
                <option value="BSD">BSD</option>
                <option value="Solaris">Solaris</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputBasedOn">Based On</label>
            <select class="form-control" name="basedon[]" id="inputBasedOn" multiple>
                <option selected value="All">All</option>
                <option value="Android">Android</option>
                <option value="Arch">Arch</option>
                <option value="CentOS">CentOS</option>
                <option value="CRUX">CRUX</option>
                <option value="Debian">Debian</option>
                <option value="Debian (Stable)">Debian (Stable)</option>
                <option value="Debian (Testing)">Debian (Testing)</option>
                <option value="Debian (Unstable)">Debian (Unstable)</option>
                <option value="Fedora">Fedora</option>
                <option value="FreeBSD">FreeBSD</option>
                <option value="Gentoo">Gentoo</option>
                <option value="Independent">Independent</option>
                <option value="KDE neon">KDE neon</option>
                <option value="KNOPPIX">KNOPPIX</option>
                <option value="LFS">LFS</option>
                <option value="Mageia">Mageia</option>
                <option value="Mandriva">Mandriva</option>
                <option value="Manjaro">Manjaro</option>
                <option value="OpenBSD">OpenBSD</option>
                <option value="openSUSE">openSUSE</option>
                <option value="PCLinuxOS">PCLinuxOS</option>
                <option value="Puppy">Puppy</option>
                <option value="Red Hat">Red Hat</option>
                <option value="rPath">rPath</option>
                <option value="sidux">sidux</option>
                <option value="Slackware">Slackware</option>
                <option value="SliTaz">SliTaz</option>
                <option value="Solaris">Solaris</option>
                <option value="Ubuntu">Ubuntu</option>
                <option value="Ubuntu (LTS)">Ubuntu (LTS)</option>
                <option value="Tiny Core">Tiny Core</option>
                <option value="Zenwalk">Zenwalk</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputOrigin">Origin</label>
            <select class="form-control" name="origin[]" multiple>
                <option selected value="All">All</option>
                <option value="Algeria">Algeria</option>
                <option value="Argentina">Argentina</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Belgium">Belgium</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Brazil">Brazil</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Canada">Canada</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Cuba">Cuba</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="Greece">Greece</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Latvia">Latvia</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malta">Malta</option>
                <option value="Mexico">Mexico</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Réunion">Réunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Serbia">Serbia</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="USA">USA</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputArchitecture">Architecture</label>
            <select class="form-control" name="architecture[]" id="inputArchitecture" multiple>
                <option selected value="All">All</option>
                <option value="acorn26">acorn26</option>
                <option value="acorn32">acorn32</option>
                <option value="alpha">alpha</option>
                <option value="amiga">amiga</option>
                <option value="arc">arc</option>
                <option value="arm">arm</option>
                <option value="armv5tel">armv5tel</option>
                <option value="arm64">arm64</option>
                <option value="armel">armel</option>
                <option value="armhf">armhf</option>
                <option value="atari">atari</option>
                <option value="cats">cats</option>
                <option value="cobalt">cobalt</option>
                <option value="dreamcast">dreamcast</option>
                <option value="emips">emips</option>
                <option value="evbarm">evbarm</option>
                <option value="evbmips">evbmips</option>
                <option value="evbppc">evbppc</option>
                <option value="evbsh3">evbsh3</option>
                <option value="ews4800mips">ews4800mips</option>
                <option value="hp300">hp300</option>
                <option value="hp700">hp700</option>
                <option value="hpcarm">hpcarm</option>
                <option value="hpcmips">hpcmips</option>
                <option value="hpcsh">hpcsh</option>
                <option value="hppa">hppa</option>
                <option value="i386">i386</option>
                <option value="i486">i486</option>
                <option value="i586">i586</option>
                <option value="i686">i686</option>
                <option value="ia64">ia64</option>
                <option value="ibmnws">ibmnws</option>
                <option value="ix86">ix86</option>
                <option value="luna68k">luna68k</option>
                <option value="m68010">m68010</option>
                <option value="m68k">m68k</option>
                <option value="mips">mips</option>
                <option value="mipsco">mipsco</option>
                <option value="mipsel">mipsel</option>
                <option value="mvme68k">mvme68k</option>
                <option value="mvmeppc">mvmeppc</option>
                <option value="news68k">news68k</option>
                <option value="newsmips">newsmips</option>
                <option value="ns32k">ns32k</option>
                <option value="ofppc">ofppc</option>
                <option value="pmax">pmax</option>
                <option value="powerpc">powerpc</option>
                <option value="ppc64">ppc64</option>
                <option value="ppc64el">ppc64el</option>
                <option value="prep">prep</option>
                <option value="ps2">ps2</option>
                <option value="ps3">ps3</option>
                <option value="s390">s390</option>
                <option value="s390x">s390x</option>
                <option value="sandpoint">sandpoint</option>
                <option value="sgimips">sgimips</option>
                <option value="sh3eb">sh3eb</option>
                <option value="sh3el">sh3el</option>
                <option value="sh5">sh5</option>
                <option value="shark">shark</option>
                <option value="sparc32">sparc32</option>
                <option value="sparc64">sparc64</option>
                <option value="sun2">sun2</option>
                <option value="sun3">sun3</option>
                <option value="vax">vax</option>
                <option value="x68k">x68k</option>
                <option value="x86_64">x86_64</option>
                <option value="xbox">xbox</option>
                <option value="zaurus">zaurus</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputDesktop">Desktop</label>
            <select class="form-control" name="desktop[]" id="inputDesktop" multiple>
                <option selected value="All">All</option>
                <option value="No desktop">No desktop</option>
                <option value="AfterStep">AfterStep</option>
                <option value="Android">Android</option>
                <option value="Awesome">Awesome</option>
                <option value="Blackbox">Blackbox</option>
                <option value="bspwm">bspwm</option>
                <option value="Budgie">Budgie</option>
                <option value="Cinnamon">Cinnamon</option>
                <option value="Consort">Consort</option>
                <option value="Deepin">Deepin</option>
                <option value="dwm">dwm</option>
                <option value="Enlightenment">Enlightenment</option>
                <option value="Equinox">Equinox</option>
                <option value="Firefox">Firefox</option>
                <option value="Fluxbox">Fluxbox</option>
                <option value="flwm">flwm</option>
                <option value="FVWM">FVWM</option>
                <option value="GNOME">GNOME</option>
                <option value="Hackedbox">Hackedbox</option>
                <option value="i3">i3</option>
                <option value="IceWM">IceWM</option>
                <option value="ion">ion</option>
                <option value="JWM">JWM</option>
                <option value="KDE">KDE</option>
                <option value="KDE Plasma">KDE Plasma</option>
                <option value="Kodi (XBMC)">Kodi (XBMC)</option>
                <option value="Lesstif">Lesstif</option>
                <option value="Lumina">Lumina</option>
                <option value="LXDE">LXDE</option>
                <option value="LXQt">LXQt</option>
                <option value="MATE">MATE</option>
                <option value="Maynard">Maynard</option>
                <option value="Metacity">Metacity</option>
                <option value="Mezzo">Mezzo</option>
                <option value="Moblin">Moblin</option>
                <option value="Openbox">Openbox</option>
                <option value="Pantheon">Pantheon</option>
                <option value="Pearl">Pearl</option>
                <option value="pekwm">pekwm</option>
                <option value="Ratpoison">Ratpoison</option>
                <option value="Razor-qt">Razor-qt</option>
                <option value="SLWM">SLWM</option>
                <option value="Sugar">Sugar</option>
                <option value="Trinity">Trinity</option>
                <option value="TWM">TWM</option>
                <option value="Unity">Unity</option>
                <option value="WebUI">WebUI</option>
                <option value="WMaker">WMaker</option>
                <option value="WMFS">WMFS</option>
                <option value="WMI">WMI</option>
                <option value="Xfce">Xfce</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputCategory">Category</label>
            <select class="form-control" name="category[]" id="inputCategory" multiple>
                <option selected value="All">All</option>
                <option value="Beginners">Beginners</option>
                <option value="Clusters">Clusters</option>
                <option value="Data Rescue">Data Rescue</option>
                <option value="Desktop">Desktop</option>
                <option value="Disk Management">Disk Management</option>
                <option value="Docker">Docker</option>
                <option value="Education">Education</option>
                <option value="Firewall">Firewall</option>
                <option value="Forensics">Forensics</option>
                <option value="Free Software">Free Software</option>
                <option value="Gaming">Gaming</option>
                <option value="High Performance Computing">High Performance Computing</option>
                <option value="Live Medium">Live Medium</option>
                <option value="Multimedia">Multimedia</option>
                <option value="MythTV">MythTV</option>
                <option value="NAS">NAS</option>
                <option value="Netbooks">Netbooks</option>
                <option value="Old Computers">Old Computers</option>
                <option value="Privacy">Privacy</option>
                <option value="Raspberry Pi">Raspberry Pi</option>
                <option value="Scientific">Scientific</option>
                <option value="Server">Server</option>
                <option value="Security">Security</option>
                <option value="Source-based">Source-based</option>
                <option value="Specialist">Specialist</option>
                <option value="Telephony">Telephony</option>
                <option value="Thin Client">Thin Client</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputStatus">Status</label>
            <select class="form-control" name="status" id="status">
                <option>Active</option>
                <option>Dormant</option>
                <option>Discontinued</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputVersion">Version</label>
            <input type="text" class="form-control" id="inputVersion" name="version" placeholder="Distro Version">
        </div>
        <div class="form-group">
            <label for="inputWeb">Web</label>
            <input type="text" class="form-control" id="intputMainPage" name="main_page"
                   placeholder="Distro Official Web">
        </div>
        <div class="form-group">
            <label for="inputDoc">Doc</label>
            <input type="text" class="form-control" id="inputDoc" name="doc" placeholder="Official Doc Website">
        </div>
        <div class="form-group">
            <label for="inputForum">Forums</label>
            <input type="text" class="form-control" id="inputForum" name="forums"
                   placeholder="Distro Official Forum Website">
        </div>
        <div class="form-group">
            <label for="inputError">Error Tracker</label>
            <input type="text" class="form-control" id="error_tracker" name="error_tracker"
                   placeholder="Distro Official Error Tracker Website">
        </div>
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea class="form-control" name="description" id="inputDescription" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div><!-- /.container -->
</body>

</html>