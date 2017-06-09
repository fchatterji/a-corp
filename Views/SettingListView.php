<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<?php foreach($settingList as $setting):?>

<form class="form-inline" method="post" action="/<?php echo $organismId ?>/setting/update/<?php echo $setting['id'] ?>">
  <label class="sr-only" for="inlineFormInput">Setting</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" name="setting" value="<?php echo $setting['setting'] ?>">

  <label class="sr-only" for="inlineFormInputGroup">Value</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <input type="text" class="form-control" id="inlineFormInputGroup" name="value" value="<?php echo $setting['value'] ?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php endforeach; ?>

<?php include "Partials/footer.php"; ?>