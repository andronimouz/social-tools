# Social Tools
@IFGIOVANNI en [Twitter](http://twitter.com/ifgiovanni) |
[Facebook](http://facebook.com/ifgiovanni) |
[Instagram](http://instagram.com/ifgiovanni) |
[YouTube](http://youtube.com/ifgiovanni) 

SocialTools es una pequeña clase de PHP la cual facilitará algunas acciones a los desarrolladores web.

La idea es facilitar el acceso a funciones que quizá pueden ser complicadas para algunos.

## Como configurar la clase
La clase SocialTools se configura de una manera sencilla, debido a que para obtener algunos datos es necesario el acceso a las APIs de Facebook, Youtube, entre otras... es necesario poseer dicha información. A continuación te explicamos como obtener dicha información.

#### Datos de configuración
Necesitamos el acceso a 3 datos en especifico:

- **FB_APP_ID:** Lo podemos obtener en la página de desarrolladores de Facebook, simplemente debemos crear una aplicación (el enlace estará abajo) y ellos nos brindan el ID de la aplicación.
- **FB_APP_SECRET:** Lo conseguimos de la misma forma que el anterior.
- **YOUTUBE_KEY:** Para conseguir esta clave debemos ir a la consola de desarrolladores de Google y en el apartado de Credenciales crear una clave de API.
----------------
- Página de desarrolladores de Facebook: https://developers.facebook.com/apps
- Consola de desarrolladores de Youtube: https://console.developers.google.com/apis/library
----------------
*Nota: no debes hacer pública la clave secreta de tu aplicación de Facebook*

## Funciones disponibles
#### función getPagesLikes()
Obtener la cantidad de likes de una página de Facebook.
Ejemplo de uso: Esta función recibe como parámetro el ID único de la página de Facebook de la cual queremos obtener la cantidad de likes.

```php
<?php
  require_once('socialtools.class.php');
  echo SocialTools::getPagesLikes("1843788915845323");
?>
```
El código anterior devuelve:  `1721`

#### función getTwitterFollowersCount()
Obtener la cantidad de seguidores de una cuenta de Twitter.
Ejemplo de uso: Esta función recibe como parámetro el usuario de Twitter cual queremos obtener la cantidad de seguidores.

```php
<?php
  require_once('socialtools.class.php');
  echo SocialTools::getTwitterFollowersCount("IFGIOVANNI");
?>
```
El código anterior devuelve:  `31`

#### función getYouTubeSuscribersCount
Obtener la cantidad de suscriptores de un canal de YouTube.
Ejemplo de uso: Esta función recibe como parámetro el ID del canal de Youtube del cual queremos obtener la cantidad de suscriptores.

```php
<?php
  require_once('socialtools.class.php');
  echo SocialTools::getYouTubeSuscribersCount("UC2CCiLDwDfnr_SgF2CRdK5g");
?>
```
El código anterior devuelve:  `444`

--------

### Listado de funciones:
- getPagesLikes
- getInstagramFollowedByCount
- getInstagramFollowsCount
- getInstagramProfilePicture
- getFBShareCount
- getTwitterFollowersCount
- getYouTubeSuscribersCount

#### Estoy trabajando en más funciones, iré actualizando poco a poco la clase. Saludos.