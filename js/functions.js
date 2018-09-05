jQuery(function() {
  jQuery("#navbutton").click(function() {
    jQuery("#header-nav").slideToggle();
  });

  // Draw qrcode.
  jQuery(".qrcode").each(function(i, elem){
    var addr = jQuery(elem).attr('text');
    new QRCode(elem, {
      text: addr,
      width: 100,
      height: 100,
      colorDark: "#888888",
      correctLevel: QRCode.CorrectLevel.L
    });
  });

  var btcaddr = jQuery("#btc-info").attr('addr');
  if (typeof btcaddr !== "undefined") {
    getBTCInfo(btcaddr);
  }

  var bchaddr = jQuery("#bch-info").attr('addr');
  if (typeof bchaddr !== "undefined") {
    getBCHInfo(bchaddr);
  }
});

function getBTCInfo(btcaddr) {
  jQuery.ajax({
    url: 'https://blockexplorer.com/api/addr/' + btcaddr,
    dataType: 'json',
    type: 'GET',
    success: function (data) {
      jQuery("#donated-btc").text(Math.round((data.totalReceived * 1000) * 100) / 100);
      jQuery("#supporters-btc").text(data.txApperances);
    },
    error: function (data) {
      console.error(data);
    }
  });
}

function getBCHInfo(bchaddr) {
  jQuery.ajax({
    url: 'https://rest.bitcoin.com/v1/address/details/' + bchaddr,
    dataType: 'json',
    type: 'GET',
    success: function(data) {
      jQuery("donated-bch").text(Math.round((data.totalReceived * 1000) * 100) / 100);
      jQuery("#supporters-bch").text(data.txApperances);
    },
    error: function(data) {
      console.error(data);
    }
  });
}
