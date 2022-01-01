<div class = "form-step-navigation" style = "overflow: auto;">
	<div style = "float: right;">
		<button type = "reset" id = "reset" class = "btn btn-rounded waves-effect" onclick = "resetForm()">Reset</button>
		<button type = "button" id = "previous" class = "btn btn-rounded waves-effect" onclick = "nextPrev(-1)">Previous</button>
		<button type = "button" id = "next" class = "btn btn-rounded waves-effect" onclick = "setTimeout(nextPrev, 100, 1)">Next</button>
	</div>
</div>
<div class = "form-steps" style = "text-align: center; margin-top: 40px;"></div>