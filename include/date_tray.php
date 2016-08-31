    <br>
    <select style="width: 32%" name="date">
        <?php
        for($i=1;$i<32; $i++){
        echo "<option value= " . $i .  " >" . $i . "</option>";
        }
        ?>
    </select>
    <select name="month" style="width: 32%">
        <option value="JAN">JANUARY</option>
        <option value="FEB">FEBRUARY</option>
        <option value="MAR">MARCH</option>
        <option value="APR">APRIL</option>
        <option value="MAY">MAY</option>
        <option value="JUN">JUNE</option>
        <option value="JUL">JULY</option>
        <option value="AUG">AUGUST</option>
        <option value="SEP">SEPTEMBER</option>
        <option value="OCT">OCTOBER</option>
        <option value="NOV">NOVEMBER</option>
        <option value="DEC">DECEMBER</option>
    </select>
    
    <select name="year" style="width: 32%">
        <?php
        for($i=1950;$i<2030; $i++){
        echo "<option value= " . $i .  " >" . $i . "</option>";
        }
        ?>
    </select> </br>



