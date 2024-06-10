<?PHP
include_once 'seja/seja.php';
include_once 'baza/baza.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Svet storitev</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/index.css">
        <link rel="stylesheet" href="CSS/main.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <div class="container-fluid header">
        <div class="row align-items-center">
            <h1 class="col-sm-9">Svet storitev</h1>
            <?php
            if(isset($_SESSION['ime'])){
                $i=$_SESSION['ime'];
                $p=$_SESSION['priimek'];
                echo '<div class="col-sm-1 text-center user-info">'.$i.' '.$p.'</div>';
                echo '<a href="uporabniki/settings.php" class="col-sm-1 text-center"><img class="settings" src="uporabljeneSlike/cog.png"></a>';
                echo '<a href="uporabniki/odjava.php" class="btn btn-primary col-sm-1 text-center">Odjava</a>';
            } else {
                echo '<a href="uporabniki/prijava_uporabnika.php" class="btn btn-primary col-sm-1">Prijavite se</a>';
            }
            ?>
        </div>
    </div>
    <div class="container-fluid">
        <form action="#" method="post" class="form-inline justify-content-center">
            <label for="serviceType" class="mr-2">Kaj iščete danes:</label>
            <select id="serviceType" name="storitev" class="form-control mr-2">
                <option value="vodovodar">Vodovodarji</option>
                <option value="keramicar">Keramičarji</option>
            </select>
            <input type="submit" value="Išči" class="btn btn-primary">
        </form>
    </div>
    <?php
    if(isset($_POST['storitev'])){
        $sql = "SELECT st.id, k.ime as kraj, s.ime as storitev, st.dodatki, u.ime, u.priimek 
                FROM storitveniki st
                INNER JOIN storitev s ON s.id=st.storitev_id
                INNER JOIN kraji k ON k.id=st.kraj_id
                INNER JOIN uporabniki u ON u.id=st.uporabnik_id
                WHERE s.ime=lower('".$_POST['storitev']."')";
        $storitveniki = mysqli_query($link, $sql);

        if(mysqli_num_rows($storitveniki)){
            while($prikaz = mysqli_fetch_array($storitveniki)){
                $sqlSlike = "SELECT pot FROM slike_storitveniki WHERE storitvenik_id='".$prikaz['id']."'";
                $slike = mysqli_query($link, $sqlSlike);
                echo '<div class="container">';
                echo '<div class="slideshow-text-container">';
                echo '<div class="slideshow-container">';
                $count = 0;
                while($row = mysqli_fetch_array($slike)){
                    $count++;
                    echo '<div class="mySlides">';
                    echo '<div class="numbertext">'.$count.' / '.mysqli_num_rows($slike).'</div>';
                    echo '<img src="'.$row['pot'].'" style="width:100%; height:auto;">';
                    echo '</div>';
                }
                echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
                echo '<a class="next" onclick="plusSlides(1)">&#10095;</a>';
                echo '</div>'; // End of slideshow container

                echo '<div class="pisava"><div class="ime">'.$prikaz['ime'].' '.$prikaz['priimek'].'</div>';
                echo $prikaz['dodatki'];
                echo '</div></div></div>';
            }
        } else {
            echo '<div class="container"><div class="row justify-content-center"><div class="col-md-10 custom-bg"> Tukaj še ni storitvenikiov.</div></div></div>';
        }
    } else {
        echo '<div class="container"><div class="row justify-content-center"><div class="col-md-10 custom-bg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas bibendum lacus nec leo commodo, vitae interdum magna ornare. Vestibulum a erat a dui viverra ultrices. Vestibulum posuere tincidunt gravida. Nulla ut odio semper, molestie nisi et, faucibus risus. Pellentesque mollis ante ac iaculis vestibulum. Phasellus tempor, nisl ut venenatis vehicula, sem ante convallis enim, eget auctor neque diam sit amet augue. Nulla tristique, leo vel molestie mattis, elit nunc tempor odio, ac convallis sem dui id est. Integer iaculis augue tellus, eget consequat risus blandit in.

        Mauris fermentum hendrerit risus placerat malesuada. Integer consequat ante id felis iaculis, sed eleifend augue faucibus. Mauris vel risus odio. Vivamus eget ante eu dolor facilisis imperdiet ut ut odio. Morbi ullamcorper id leo eu cursus. Aenean tempor mattis mauris quis laoreet. Sed lorem ante, condimentum nec tempor faucibus, tincidunt sit amet odio. Nunc vulputate libero nec dolor bibendum aliquet. Aliquam erat volutpat. Duis consectetur elit eros, at tempus ipsum sollicitudin quis. Vestibulum imperdiet est et felis facilisis cursus. Aenean a urna convallis, fermentum tellus ut, mollis lacus. Aliquam ultricies purus ut eros placerat, sed fringilla sem finibus. Pellentesque quis suscipit lorem.

        Proin venenatis venenatis mauris sed eleifend. Nunc pellentesque ultrices eros et laoreet. Quisque auctor pretium metus. Phasellus id quam ac est condimentum suscipit placerat quis sapien. Vivamus efficitur libero et mauris consectetur sagittis. Duis erat elit, condimentum et convallis sit amet, laoreet ut nisi. Mauris eu libero vitae eros vulputate sagittis a sit amet enim. Nunc facilisis arcu in pellentesque tempor. Sed ornare, sem nec luctus dignissim, dui purus sagittis ante, vel rutrum quam nisi sed velit.</div></div></div>';
    }
    ?>
<!-- Slideshow functionality -->
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
}
</script>
    </body>
    </html>