 <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://fyntune.in/ ">fyntune.in</a>.</strong>
<!--    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://theeventapp.in/ ">theeventapp.in</a>.</strong>-->
    All rights reserved.
<!-- 	<span style="display:none;"><?php display($this->session->all_userdata()); ?><span>
 -->  </footer>
  
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<!--<script src="<?php // echo base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>-->
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
<script>
  function initFreshChat() {
    window.fcWidget.init({
		token: "e786c6f8-7026-4b14-ac27-637a1fb4585f",
		host: "https://wchat.in.freshchat.com",
		siteId: "adminPanel",
		externalId: "<?php echo $this->session->userdata('organizer_id'); ?>",     // user’s id unique to your system
		firstName: "<?php echo $this->session->userdata('user_name'); ?>",              // user’s first name
		// lastName: "Doe",                // user’s last name
		// email: "john.doe@gmail.com",    // user’s email address
		// phone: "8668323090",            // phone number without country code
		// phoneCountryCode: "+1"          // phone’s country code
    });
  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.in.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>
</body>
</html>

<?php if ($this->session->flashdata('success')) { ?>
    <script> 
        toastr.success('<?php echo $this->session->flashdata('success'); ?>')
    </script> 
<?php } elseif ($this->session->flashdata('error')) { ?>
    <script> 
        toastr.error('<?php echo $this->session->flashdata('error'); ?>')
    </script>
<?php } ?>