<form id="bookform" method="post" action="<?php echo HTTP_PATH.'index.php?url=doboz' ?>">
     <div id="stuff">
         <p style="margin-bottom: 15px; text-align: center;">
             <b>Foglalj időpontot</b> születésnapra, legénybúcsúra vagy baráti összejövetelre! <br><br> <b>Book your</b> birthday, bachelor party or any gathering with your friends!     
             </p>   
            <label>Név / Name:</label>
            <input id="name" type="text" name="name" />
            <label>e-mail:</label>
            <input id="e-mail" type="email" name="email" />
            <label>Telefon / Phone:</label>
            <input id="phone" type="text" name="phone" />
            <label>Dátum / Date:</label>
            <input id="date" type="datetime" name="date" value="<?php echo SYS_DATE; ?>" />
            <label>Érkezés / ETA:</label>
            <input id="eta" type="text" name="ETA" value="20:00" />
            <label>Típus / Type:</label>
            <select id="type" name="type">
                <option>Születésnap - Birthday</option>
                <option>Legénybúcsú - Bachelor Party</option>
                <option>Összejövetel - Gathering</option>
            </select>
            <label>Létszám / Number:</label>
            <input id="number" type="number" name="number" />
     </div>
    <div class="warning"></div>
    
            <input id="submit" type="submit" value="Foglalás / Booking" name="submit" onclick="checkform()" />
</form>

