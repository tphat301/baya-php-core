<div class="fixbar-res">
  <ul>
    <li>
      <a href="<?= $optsetting['link_googlemaps'] ?>" target=" _blank" title="GG Map">
        <img src="assets/images/2.png" alt="GG Map" />
      </a>
    </li>
    <li>
      <a href="sms:<?= $func->parsePhone($optsetting['hotline']) ?>" title="SMS">
        <img src="assets/images/4.jpg" alt="SMS">
      </a>
    </li>
    <li class="center-phone">
      <a href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>" title="Phone">
        <span class="mphone"><i class="fas fa-phone-alt"></i></span>
      </a>
    </li>
    <li>
      <a href="https://zalo.me/<?= $func->parsePhone($optsetting['zalo']) ?>" target="_blank" title="Zalo">
        <img src="assets/images/za1.png" alt="Zalo" />
      </a>
    </li>
    <li>
      <a href="<?= $optsetting['fanpage'] ?>" class="mess" target="_blank" title="Fanpage">
        <svg id="fb-msng-icon" data-name="messenger icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 30.47 30.66">
          <path d="M29.56,14.34c-8.41,0-15.23,6.35-15.23,14.19A13.83,13.83,0,0,0,20,39.59V45l5.19-2.86a16.27,16.27,0,0,0,4.37.59c8.41,0,15.23-6.35,15.23-14.19S38,14.34,29.56,14.34Zm1.51,19.11-3.88-4.16-7.57,4.16,8.33-8.89,4,4.16,7.48-4.16Z" transform="translate(-14.32 -14.34)" style="fill:#fff"></path>
        </svg>
      </a>
    </li>
  </ul>
</div>