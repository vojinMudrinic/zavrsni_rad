
<ul>
                   
<?php foreach($comments as $comment){?>
    <li><strong><?php echo $comment["Author"] ." ";?></strong>
        <?php echo $comment["Text"];?></li>
</br>

<?php } ?>

</ul>