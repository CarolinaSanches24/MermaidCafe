#### Install packages with ppa

```bash
sudo add -apt-repository ppa:ondrej/php
```
### view version 
```bash
php -v
```
### Formatar exibição do vardump

```php
header("Content-type: text/php charset=utf-8");
```
### Instalação de lib para gerar pdf 
```bash
 composer require dompdf/dompdf
```

[Lib packagist](https://packagist.org/packages/dompdf/dompdf)

#### Concatenação
```
 <img src="<?= 'img/'.$almoco['imagem'] ?>">
```

