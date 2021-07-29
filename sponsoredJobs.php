<?php 
    require 'mydb.php';
    $db = new MyDb();
    $sponsoreds = $db->getSponsored();
    $count=0;
?>
<?php foreach($sponsoreds as $sponsored) {
    $count=$count+1;
    if($count > 6 )
    break;
    ?>

<div class="card" style="width: 18rem;">
    <img src="<?php echo $sponsored['image']; ?>" class="card-img-top" alt="job offer">
    <div class="card-body ">
        <h6 class="card-title"><?php echo $sponsored['jobTitle'];?></h6>
        <p class="card-text"><?php echo $sponsored['companyName'];?></p>
        <div class="footer">
                <a href="jobOffer/details.php?id=<?php echo $sponsored['jobID'];?>" class="btn btn-primary">Details</a>
                <p><?php echo $sponsored['offerDate'];?></p>
        </div>
    </div>
</div>

<?php } ?>