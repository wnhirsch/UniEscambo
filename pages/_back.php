<style type="text/css">
	body {
	    overflow: hidden;
	}
	.back {
		content: "";
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		background-size: cover;
		background-position: center;
		position: absolute;
		z-index: -1;
		animation-duration: 40s;
		animation-iteration-count: infinite;
	}
	#img1 {
		background-image: url("http://localhost/media/img1.jpg");
		animation-name: one;
	}
	#img2 {
		background-image: url("http://localhost/media/img2.jpg");
		animation-name: two;
	}
	#img3 {
		background-image: url("http://localhost/media/img3.jpg");
		animation-name: three;
	}
	#img4 {
		background-image: url("http://localhost/media/img4.jpg");
		animation-name: four;
	}
	@keyframes one {
		0%   {opacity: 1; transform: scale(1.0);}
		20%  {opacity: 1; transform: scale(1.1);}
		25%  {opacity: 0; transform: scale(1.2);}
		95%  {opacity: 0; transform: scale(1.0);}
		100% {opacity: 1; transform: scale(1.0);}
	}
	@keyframes two {
		0%   {opacity: 0; transform: scale(1.0);}
		20%  {opacity: 0; transform: scale(1.0);}
		25%  {opacity: 1; transform: scale(1.0);}
		45%  {opacity: 1; transform: scale(1.1);}
		50%  {opacity: 0; transform: scale(1.2);}
		100% {opacity: 0; transform: scale(1.0);}
	}
	@keyframes three {
		0%   {opacity: 0; transform: scale(1.0);}
		45%  {opacity: 0; transform: scale(1.0);}
		50%  {opacity: 1; transform: scale(1.0);}
		70%  {opacity: 1; transform: scale(1.1);}
		75%  {opacity: 0; transform: scale(1.2);}
		100% {opacity: 0; transform: scale(1.0);}
	}
	@keyframes four {
		0%   {opacity: 0; transform: scale(1.0);}
		70%  {opacity: 0; transform: scale(1.0);}
		75%  {opacity: 1; transform: scale(1.0);}
		95%  {opacity: 1; transform: scale(1.1);}
		100% {opacity: 0; transform: scale(1.2);}
	}

</style>

<div class="back" id="img1"></div>
<div class="back" id="img2"></div>
<div class="back" id="img3"></div>
<div class="back" id="img4"></div>