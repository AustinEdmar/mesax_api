<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subCategorias()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function produtos()
    {
        return $this->hasManyThrough(Product::class, SubCategory::class);

        /* Claro, vou explicar este código em português:

```php:api/app/Models/Category.php
public function produtos()
{
    return $this->hasManyThrough(Product::class, SubCategory::class);
}
```

Este trecho de código define um método chamado `produtos()` na classe `Category` (Categoria). Ele estabelece uma relação "has-many-through" (tem muitos através de) no Laravel Eloquent ORM. Vamos detalhar:

1. `public function produtos()`: Este é um método público que define a relação. O nome "produtos" sugere que uma categoria pode ter vários produtos.

2. `return $this->hasManyThrough(Product::class, SubCategory::class);`: Esta linha define a relação propriamente dita.

   - `hasManyThrough()` é um método do Eloquent que estabelece uma relação "tem muitos através de".
   - `Product::class` é o modelo final que queremos acessar (produtos).
   - `SubCategory::class` é o modelo intermediário através do qual a relação passa (subcategorias).

Esta relação indica que:
- Uma Categoria tem muitas Subcategorias.
- Cada Subcategoria tem muitos Produtos.
- Portanto, uma Categoria tem muitos Produtos através das Subcategorias.

Em termos práticos, isso permite que você acesse facilmente todos os produtos de uma categoria, mesmo que eles estejam associados diretamente às subcategorias. Por exemplo, você poderia fazer algo como:

```php
$produtos = $categoria->produtos;
```

Isso retornaria todos os produtos associados a todas as subcategorias desta categoria específica, sem a necessidade de fazer consultas aninhadas manualmente. */
    }


    
}
