<!DOCTYPE html>
<html>
  <head>
    <title>Drawing Tool</title>
    <link rel="stylesheet" href="../node_modules/openlayers/dist/ol.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
    <div id="map" class="map">
      <div id="main" class="overlay">
        <h1><?= _('Drawing tool') ?></h1>
        <form action="export.php" method="post" autocomplete="off">
          <div class="form-group">
            <label for="geometry"><?= _('What do you want to draw ?') ?></label>
            <select id="geometry">
              <option value=""></option>
              <option value="Circle"><?= _('Circle') ?></option>
              <option value="Polygon"><?= _('Polygon') ?></option>
            </select>
          </div>

          <div style="text-align: center;">
            or
          </div>

          <div class="form-group">
            <label for="municipality"><?= _('Select a municipality :') ?></label>
            <select id="municipality">
              <option value=""></option>
<?php
  $municipalities = json_decode(file_get_contents('./data/municipalities.json'));
  function cmp($a, $b) { return strcasecmp($a->properties->name, $b->properties->name); }
  usort($municipalities->features, 'cmp');
  foreach ($municipalities->features as $m) {
?>
              <option value="<?= $m->id ?>"><?= htmlentities($m->properties->name) ?></option>
<?php
  }
?>
            </select>
          </div>

          <div id="main-infos">
            <div id="main-infos-area" style="display: none;">
              <strong><?= _('Area') ?> :</strong> <span></span>
            </div>
            <div id="main-infos-radius" style="display: none;">
              <strong><?= _('Radius') ?> :</strong> <span></span>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" id="btn-create-export" disabled="disabled"><?= _('Create export') ?></button>
          </div>
        </form>
      </div>
    </div>
    <script src="./drawing-tool.js"></script>
    <script>
    </script>
  </body>
</html>
