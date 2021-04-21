<?php
if (isset($ret)) {
    switch ($ret) {
        case -1:
            echo " <script> 
            toastr.error(RetonaMsg(-1));
             </script>  ";
            break;
        case 0:
            echo " <script> 
            toastr.warning(RetonaMsg(0));
             </script> ";
            break;
        case 1:
            echo " <script>
             toastr.success(RetonaMsg(1));
              </script>  ";
            break;
    }
}
