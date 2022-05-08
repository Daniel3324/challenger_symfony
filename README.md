# CHALLENGER WITH SYMFONY

## Descripción

WebServices en RestFull usando el Framework Symfony 4.4, capaz de buscar un tipo de cerveza a traves del atributo food, retornarndo de dos formas diferentes, general y detallado. Este projecto fue realçizado para cumplir con un challenger de entrevista tecnica.

## Requerimientos

- PHP >= 7.1.3
- Symfony 4.4
- composer require guzzlehttp/guzzle
- composer require annotations
- composer require symfony/validator

## Especificación
      Operation:
       - URI: /punk
       - Metodo: GET
      Request Headers:
       - Content-Type: application/json
      Query Params:
        |----------|---------|----------|-----------------------------------------------------------------------|
        | Atributo |  Tipo   | Min..Max |                            Descripcion                                |
        |----------|---------|----------|-----------------------------------------------------------------------|
        | food     | String  |   1..1   | Valor a usar para hacer la busqueda del producto                      | 
        |----------|---------|----------|-----------------------------------------------------------------------|
        | details  | Bollean |   0..1   | Si es true traera informacion del producto mas detallado (USE CASE 2) | 
        |----------|---------|----------|-----------------------------------------------------------------------|
        
## Response
Success con details true:
```json
{
    "success": true,
    "code": "200",
    "data": [
        {
            "id": 3,
            "name": "Berliner Weisse With Yuzu - B-Sides",
            "description": "Japanese citrus fruit intensifies the sour nature of this German classic.",
            "image_url": "https://images.punkapi.com/v2/keg.png",
            "tagline": "Japanese Citrus Berliner Weisse.",
            "first_brewed": "11/2015"
        }
    ]
}
```
Success con details false o null:
```json
{
    "success": true,
    "code": "200",
    "data": [
        {
            "id": 3,
            "name": "Berliner Weisse With Yuzu - B-Sides",
            "description": "Japanese citrus fruit intensifies the sour nature of this German classic."
        }
    ]
}
```
Error food null:
```json
{
    "success": false,
    "code": 401,
    "message": "This value should not be blank.->food"
}
```
Error food NOT FOUND:
```json
{
    "success": false,
    "code": 404,
    "message": "BEER_NOT_FOUND"
}
```