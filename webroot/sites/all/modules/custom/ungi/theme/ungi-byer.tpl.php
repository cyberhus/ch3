<div id="page">
  <div id="ungi-intro">
    <div id="ungi-desc">
      <?php print et('Ung i forside'); ?>
    </div>
  </div>
  <div id="ungi-cities">
    <h3>Kommuner med chat</h3>
    <ul class="ungi-with-chat">
      <?php foreach ($cities as $city): ?>
        <?php if (!empty($city->chaturl)): ?>
          <li class="ungi-city">
            <span class="ungi-cityname">
              <h2><a href="<?php print $city->url; ?>"><?php print $city->name; ?></a></h2>
              <?php if (!empty($city->chaturl)): ?>
                <p class="chat-desc"><?php print $city->chatdesc; ?></p>
              <?php else: ?>
                <p class="chat-desc">&nbsp;</p>
              <?php endif ?>
            </span>
            <div class="ungi-chat-wrapper"><!--<span class="chat-label">Chat</span>-->
              <iframe class="curachat-widgets-inline" src="<?php print $city->chaturl . "/inline/" . $city->chattype; ?>"></iframe>
            </div>
            <div class="ungi-city-options">
              <span class="city-options-text">Se hvor du kan få hjælp:</span>
              <a class="btn" href="<?php print $city->url; ?>">Tilbud i kommunen</a>
            </div>
          </li>
        <?php endif ?>
      <?php endforeach; ?>
    </ul>
    <h3 class="ungi-no-chat-header">Andre kommuner</h3>
    <ul class="ungi-no-chat">
      <?php foreach ($cities as $city): ?>
        <?php if (empty($city->chaturl)): ?>
          <li class="ungi-city">
            <span class="ungi-half ungi-cityname">
              <h2><a href="<?php print $city->url; ?>"><?php print $city->name; ?></a></h2>
            </span>
            <span class="ungi-half">
              <a class="btn" href="<?php print $city->url; ?>">Tilbud i kommunen</a>
            </span>
          </li>
        <?php endif ?>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
