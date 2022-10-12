<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="text/javascript">
   $(document).ready(function(){

      $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });
   });
</script>