<?php
return array (	
		//应用ID,您的APPID。
		'app_id'=>"2016101900723494",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key'=>"MIIEpAIBAAKCAQEAk70VfQVEavjLjX2WA9E9s4iLwnsdIUePHgTtff+FsTJhjWUlxlgLrL2H9Fg6+SQiwX/EQpauM+CCktfzftNiancBuziQwh3CcceSSZENBq0cSYRvKIs+QARlkSDK1kXOPrWZaVT2DxRnT2a5Xp7N4LfWww1ciwkcnbhi9tLBHuuiY7jo07/iMNkBtKf3YEdOSKDdyKMcC5tCru3PW4HEpi5Zz1msCswd3GcMFhql2cTiNuTkh+4EzEMjdFVp84iybRYJmU1mHN6HpAJv7ZxnUsB+raHOo01Gnk/RcM1CwRTHr07+snqxQs1QJDMbJa7b8CIxo5QuQAd6g7WW4KgoFwIDAQABAoIBAGym1NTbONQLIXhvchJgoiYVN+PRszy0afbD3P2bHHGTAdeBGeTi/8MMqJ30/XoZL05rbqUiN/+DD8R6+WK+h1SRLT7JfPyl8kjHYzijapcMXQ9cTHve2+ss0J2JJmOrduD7oVWr3EJ+2PO2MoH5/KNV0KYmf3bpPphn8LBhkxHvS6lZNgarg1H+4HA2kcOf1qSA3S9EUw/m0rjgoEcE+G1EsUeI9AgWb5dAXeesgkHDost7NjJBcDypTekn+SztXg206rGSeEzrgO4Ns+U4dlX/5VHa5t0btstIuPH4IxhNMa39Sk9MeyQBHMUc+2uSamFOmjs86TMmgiwbyJJV9gECgYEA5gJysFHOHh8hELJ1C9VtRuV/MTKHjarGW0SUK9MlTTuZd4hzVTxNc45cD4NvCoBWMwTr5FwqqC20XGOtvFWOqvj+2STAQeXkuFpk+bBGZ6JAVRh23q11rnzu0po4DWc2hfsEBWh+g9Fn+IuREht+hgNjHD3miTo8aKeZtFAlQZcCgYEApG7CvATiUgDxqedx+jjd3L7MeE+FfEaVTTn0tzKLD6weXKPsPLCsiVKUP7hAdFyu+0Jtawzc+0KsKwCav5jHevtbVS0FgnbBpcPkLa4+iQegxH86+VnSQxmNa0MOv9a6RDyhyDgMrCZSpwhdiU7ICnC4LmIKCjG906C88eysHYECgYEAgSPGuPB1Rbw8mF9aEDbYkAGylDDGoufLTtsGRkTaoK5h0Bcwih69ba/0SFGHOuIrg6GzwBdva9WdenIMzb1LyPrcO5bCyz0EWe2G3Bn4rZ8Pd7ewpf3GIR3MCTrFVeEpX7g73b15qxEbyxSxcvU06JFmSCkJEus7l5biWbbV9CkCgYEAkwKXxgPT2B8R8KaFR4JKEU7gffwSyu5ME7RqLtPYclWe+5Ju5j/KsieLdYCk16P5qZhVPS1N8LJGPVgYAo50YmaR3JAY6fCE51BBE/pB3L9eI+/gaQi+LNGOl0RnzmoLNHDE7730zoCgysd24Qj3XiYy9P0gHsckAS4nX2AK7YECgYAuKywkfXUZ1fdE7UiDfrGNBU3bh3QH4jokkz7+S0RKPCxbDniW2MuRKH9Mp117ikjyl+smB4Cd4T/IF72mF/vFd5WRYPR9qEelGrRB73Yw0T75iR3HKxym8FaMBDkj7hHYH2+8Inu0+vc8Kt2sXWskK8Fu863ePfOQBA8lG7RTww==",
		
		//异步通知地址

		'notify_url'=>"http://demo0719dm.cm:80/eva_ybu",
		
		//同步跳转
		'return_url'=>"http://demo0719dm.cm:80/eva_tbu",


		//编码格式
		'charset'=>"UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl'=>"https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key'=>"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA+STMqJdW3UhVLmJsMNcPwcZi3yz065wPuHqb3QRdMeMKzI0K8rbECXlamSUYdObgGmqNWGVCkOnFrEX4lwbC0BdCN/haZFuVnqnNA2YUClWH80xjYit2LF0umz1TQaI0zhVfMCVk3+/oKIhPoifUrznawQA+2pMDd/R0ZqNSDcgLOY/H2u8I0GhTkYw5UASjZZJMHYItSSnyN28nNUJmP8u/twBp601hvPQHZCL403QdrbadMlpNACw9mWQtEI+NnefhPXLNJWnP/a/UTmmlgGV7IcjcR6ySw/g4BZK0Hw/lzgB8npSnRRhANFn/DvtNQsv+r8LCJhs5a1J7Ou5XIQIDAQAB",
		
);