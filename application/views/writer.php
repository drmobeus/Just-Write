<?php
  if( isset($last_open_document) )
  {
    $document = $last_open_document->content;
    $title = $last_open_document->title;
    $id = $last_open_document->id;
  } else {
    $document = '';
    $title = 'Untitled Document';
    $id = '';
  }

?>
<nav id="main-menu">
  <ul id="document-controls">
    <li>Recent Documents</li>
    <?php if( isset( $users_documents ) ): ?>
      <?php foreach( $users_documents as $doc ): ?>
        <li class="<?php echo $doc->id; ?>">
          <span class="delete">
            <a class="<?php echo $doc->id; ?>" href="#" title="Delete <?php echo html_entity_decode( $doc->title, ENT_QUOTES, "UTF-8" ); ?>">
              <img src="<?php echo base_url(); ?>resources/imgs/delete.png" alt="Delete" />
            </a>
          </span>
          <a
            class="load"
            id="<?php echo $doc->id; ?>"
            href="#"
            title="<?php echo html_entity_decode( $doc->title, ENT_QUOTES, "UTF-8" ); ?>"
          >
            <?php echo html_entity_decode( $doc->title, ENT_QUOTES, "UTF-8" ); ?>
            <?php // var_dump($doc); ?> 
          </a>
        </li>
      <?php endforeach; ?>
    <?php endif; ?> 
    <li class="edit"><a href="#" title="Edit Documents">Edit</a></li>
    <li class="more"><a href="#" title="load all documents">More</a></li>
  </ul>
  <ul id="control-bar">
    <li id="doc-controls">
      <span id="doc-link">
        <a title="Recent Documents" href="#document-controls"><img src="<?php echo base_url(); ?>resources/imgs/open.png" alt="Open Document" /><span class="tool-tip">Recent Documents</span></a>
      </span>
      <span id="new-document"><a href="#new-document" title="New Document"><img src="<?php echo base_url(); ?>resources/imgs/new-doc.png" alt="New Document" /><span class="tool-tip">New Document</span></a></span>
    </li>

    <li id="title"><input name="current-doc-title" value="<?php echo html_entity_decode( $title, ENT_QUOTES, "UTF-8" ); ?>"  tabindex="1" /></li>

    <li id="current-doc-controls">
      <span id="save">
        <span id="saving">
          <img id="saving-icon" src="<?php echo base_url(); ?>resources/imgs/loader.gif" alt="saving" width="20" height="20" />
          <img id="saved" src="<?php echo base_url(); ?>resources/imgs/tick.png" alt="saved" width="10" height="10" />
        </span>
        <a href="#save" title="save document">Save</a>
      </span>

      <span id="export">
        <a class="markdown-to-html" href="#" title="Export to HTML"><img src="<?php echo base_url(); ?>resources/imgs/export.png" alt="Export to HTML"><span class="tool-tip">Export to HTML</span></a>
      </span>
    </li>

  </ul>
</nav>

<section id="document-container">
  <textarea class="<?php echo $id; ?>" id="document" name="document" tabindex="2"><?php echo html_entity_decode( $document, ENT_QUOTES, "UTF-8" ); ?></textarea>
</section>

<?php 
  $logged_in = $this->session->userdata('is_logged_in');
  if( isset($logged_in) ):
?>
<nav id="logout">

  <a href="<?php echo site_url( 'session/destroy' ); ?>" title="Logout">
    <img src="<?php echo base_url(); ?>resources/imgs/log-out.png" alt="Logout" />Logout
  </a>
</nav>
<?php endif; ?>
