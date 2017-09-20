<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="rates" method="post"  action="?controller=profiles&action=<?php echo $action; ?>"  >
                    <legend>Register as a Dog Walker</legend>
                    <label class="checkbox-inline"><input id="offerWalking" type="checkbox"  data-toggle="toggle"  data-off="No" data-on="Yes">  I offer dog walking services</label>
                    <div class="setRates" >
                        <label>Rate for 30 minute dog walk</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="30walk" >
                        </div>
                        <label>Rate for 60 mintue dog walk</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="60walk">
                        </div>
                        <label>Rate for each additional dog</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="extraDog" >
                        </div>
                        <div class="centre-content">
                            <input class="orange-btn" type="submit" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
