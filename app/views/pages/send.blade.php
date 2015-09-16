<div class="container">
    <div class="row">
        <div ng-controller="ContactCtrl" class="col-sm-8" style="margin: 0 auto; float: none">
            <h3>Please send mail!</h3>
            	<form ng-submit="submit(contactform)" name="contactform" method="post" action="" class="form-horizontal" role="form">
                    <div class="form-group" ng-class="{ 'has-error': contactform.to.$invalid && submitted }">
                        <label for="to" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input ng-model="formData.to" type="email" class="form-control" id="to" name="to" placeholder="Email To" required>
                        </div>
                    </div>
                    <div class="form-group" ng-class="{ 'has-error': contactform.subject.$invalid && submitted }">
                        <label for="subject" class="col-lg-2 control-label">Subject</label>
                        <div class="col-lg-10">
                            <input ng-model="formData.subject" type="text" class="form-control" id="subject" name="subject" placeholder="Subject Message" required>
                        </div>
                    </div>
                    <div class="form-group" ng-class="{ 'has-error': contactform.message.$invalid && submitted }">
                        <label for="message" class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-10">
                            <textarea ng-model="formData.message" class="form-control" rows="4" id="message" name="message" placeholder="Your message..." required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-default" ng-disabled="submitButtonDisabled">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
                <p ng-class="result" style="padding: 15px; margin: 0;">{[{ resultMessage }]}</p>
        </div>
    </div>
</div>

