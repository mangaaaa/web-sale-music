<div class="rightcolumn">
<table>
		<thead>
		<th>ID</th>
		<th> Song Image</th>
		<th>Song Name</th>
		<th>Song Price</th>
		<th>Song Lyric</th>
		<th>Song Mp3</th>
		<th>Genre</th>
		<th>Singer</th>
		<th></th>
		<th></th>
		</thead>
	<tbody>
		<?php
		$query="SELECT song.SongID,song.SongName,song.SongLyric,song.SongPrice,song.mp3	   ,song.SongIMG,singer.SingerName,genre.GenreName
				FROM song,genre,singer
				WHERE song.GenreID=genre.GenreID AND song.SingerID=singer.SingerID";
		$rs= mysqli_query($conn,$query);
		if(mysqli_num_rows($rs) >0)
		while($row=mysqli_fetch_assoc($rs)){ 
		 ?>
		 <tr>
		 	<td><?=$row['SongID']?></td>
		 	<td><img class="anh-sp" src="../img/<?=$row['SongIMG']?>"/></td>
		 	<td><?=$row['SongName']?></td>
		 	<td><?=$row['SongPrice']." $"?></td>
		 	<td><textarea><?=$row['SongLyric']?></textarea></td>
		 	<td><?=$row['mp3']?></td>
		 	<td><?=$row['GenreName']?></td>
		 	<td><?=$row['SingerName']?></td>
		 	<td><a href="suasong.php?id=<?=$row['SongID']?>" style="text-decoration: none;"> Update</a></td>
		 	<td><a href="?idxoa=<?=$row['SongID']?>"style="text-decoration: none;"> Delete</a></td>
		 </tr>
		 <?php 
		}
		  ?>
	</tbody>
</table>
</div>
</div>
