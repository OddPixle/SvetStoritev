<?PHP
include_once 'seja/seja.php';
include_once 'baza/baza.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Svet storitev</title>
        <link rel="stylesheet" href="CSS/index.css">
    </head>
    <body>
        <div class="header">
        <h1>Svet storitev</h1>
        <div class="upime">
        <?PHP
        //username
        if(isset($_SESSION['ime']) AND ($_SESSION['priimek'])){
            $i=$_SESSION['ime'];
            $p=$_SESSION['priimek'];
            echo '<div>'.$i.' '.$p.'</div>';
            echo '<a href="uporabniki/settings.php"><img src="uporabljeneSlike/cog.png"></a>';
            echo '<a href="uporabniki/odjava.php">Odjava</a>';
        }else{
            echo '<a href="uporabniki/prijava_uporabnika.php">Priajvite se</a>';
        }
        ?>
        </div>
        </div>
        <div class="narocanje">
            <form action="#" method="post">
                <label for="serviceType">Kaj iščete danes:</label>
                <select id="serviceType" name="storitev">
                    <option value="vodovodar">Vodovodarji</option>
                    <option value="electricar">Elektro inštalaterji</option>
                    <option value="keramicar">Keramičarji</option>
                </select>
                <input type="submit" value="Išči">
                </form>
        </div>
        <?PHP
        if(isset($POST['storitev'])){
        $sql="SELECT * FROM storitveniki st
              INNER JOIN storitev s ON s.id=st.storitev_id
              INNER JOIN kraji k ON k.id=st.kraj_id
              INNER JOIN uporabniki u ON u.id=st.uporabnik_id
              WHERE s.ime=lower($POST ['storitev'])";
        for($i=0;$i<10;$i++){
            echo '<div class="storitveniki_prikaz">';
                
            echo '</div>';
        }
    }else{
        echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas bibendum lacus nec leo commodo, vitae interdum magna 
        ornare. Vestibulum a erat a dui viverra ultrices. Vestibulum posuere tincidunt gravida. Nulla ut odio semper, molestie nisi et, 
        faucibus risus. Pellentesque mollis ante ac iaculis vestibulum. Phasellus tempor, nisl ut venenatis vehicula, sem ante convallis
         enim, eget auctor neque diam sit amet augue. Nulla tristique, leo vel molestie mattis, elit nunc tempor odio, ac convallis sem 
        dui id est. Integer iaculis augue tellus, eget consequat risus blandit in.

        Mauris fermentum hendrerit risus placerat malesuada. Integer consequat ante id felis iaculis, sed eleifend augue faucibus. 
        Mauris vel risus odio. Vivamus eget ante eu dolor facilisis imperdiet ut ut odio. Morbi ullamcorper id leo eu cursus. Aenean 
        tempor mattis mauris quis laoreet. Sed lorem ante, condimentum nec tempor faucibus, tincidunt sit amet odio. Nunc vulputate 
        libero nec dolor bibendum aliquet. Aliquam erat volutpat. Duis consectetur elit eros, at tempus ipsum sollicitudin quis. 
        Vestibulum imperdiet est et felis facilisis cursus. Aenean a urna convallis, fermentum tellus ut, mollis lacus. Aliquam 
        ultricies purus ut eros placerat, sed fringilla sem finibus. Pellentesque quis suscipit lorem.
        
        Proin venenatis venenatis mauris sed eleifend. Nunc pellentesque ultrices eros et laoreet. Quisque auctor pretium metus. 
        Phasellus id quam ac est condimentum suscipit placerat quis sapien. Vivamus efficitur libero et mauris consectetur sagittis. 
        Duis erat elit, condimentum et convallis sit amet, laoreet ut nisi. Mauris eu libero vitae eros vulputate sagittis a sit amet 
        enim. Nunc facilisis arcu in pellentesque tempor. Sed ornare, sem nec luctus dignissim, dui purus sagittis ante, vel rutrum 
        quam nisi sed velit.';
    }
        ?>
    <body>
</html>