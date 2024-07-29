# useContext

`useContext` é um Hook React que eixa você e subscrever ao [context](https://react.dev/learn/passing-data-deeply-with-context) a partir do seu componente.

```javascript
const value = useContext(SomeContext)
```

* Referência
    * useContext(someContext)
* Uso
    * 


## Referência
### `useContext(SomeContext)`

Chame `useContext` no topo do seu componente para ler e sobrescrever ao context.

```javascript
import { useContext } from 'react';

function MyComponent() {
  const theme = useContext(ThemeContext);
  // ...
```

[Veja mais exemplos abaixo](https://react.dev/reference/react/useContext#usage)

### Parâmetros
* `SomeContext`: O contexto que você criou anteriormente com o `createContext`. O contexto por si só não segunra a informação, ele só representa um tipo de informação que você pode provê ou ler a partir de um componente.

### Retorno
`useContext` retorna o valor do do contexto do componente a ser chamado. Isso é determinado pelo valor passado para o SomeContext.Provider mais próximo na árvore de componentes acima. Se não há um provider, então o valor retornado será o valor default que você passou para o `createContext` desse contexto. O valor retornado é sempre atualizado. React automaticamente re-renderiza os componentes que lêem algum contexto, se eles mudam.