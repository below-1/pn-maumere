<ul class="pagination ">
  <li class="page-item <?= $pagination->page == 1 ? 'disabled' : '' ?>">
    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
      prev
    </a>
  </li>
  <?php foreach ($pagination->links as $link): ?>
    <li class="page-item <?= $link->page == $pagination->page ? 'active' : '' ?>">
      <a class="page-link" href="<?= $link->url ?>"><?= $link->page ?></a>
    </li>  
  <?php endforeach ?>
  <li class="page-item <?= $pagination->page == $pagination->totalPage ? 'disabled' : '' ?>">
    <a class="page-link" href="#">
      next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
    </a>
  </li>
</ul>