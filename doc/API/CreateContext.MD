// https://react.dev/reference/react/createContext

# createContext

`createContext` permite que você crie um [contexto](https://react.dev/learn/passing-data-deeply-with-context) que os componentes podem fornecer ou ler.

```typescript
const SomeContext = createContext(defaultValue);
```

- [Referência](https://react.dev/reference/react/createContext#reference)
    - `[createContext(defaultValue)](https://react.dev/reference/react/createContext#createcontext)`
    - `[SomeContext.Provider](https://react.dev/reference/react/createContext#provider)`
    - `[SomeContext.Consumer](https://react.dev/reference/react/createContext#consumer)`

- [Uso](https://react.dev/reference/react/createContext#usage)
    - [Criando contexto](https://react.dev/reference/react/createContext#creating-context)
    - [Importando e exportando contexto de um arquivo](https://react.dev/reference/react/createContext#importing-and-exporting-context-from-a-file)
- [Resolução de problemas](https://react.dev/reference/react/createContext#troubleshooting)
    -[Não consigo encontrar uma forma de mudar o valor do contexto](https://react.dev/reference/react/createContext#i-cant-find-a-way-to-change-the-context-value)

## Referência

### `createContext(defaultValue)`

Chame `createContext` fora de qualquer componente para criar um contexto.

```typescript
import { createContext } from 'react';

const ThemeContext = createContext('light');
```

[Veja mais exemplos abaixo](https://react.dev/reference/react/createContext#usage).

### Parâmetros

- `defaultValue`: O valor que você quer que o contexto tenha quando não houver um provedor de contexto correspondente na árvore acima do componente que lê o contexto. Se você não tiver um valor padrão significativo, especifique `null`. O valor padrão é uma solução de "último recurso" e não muda com o tempo.

### Retorna

`createContext` retorna um objeto de contexto.

**O objeto de contexto em si não contém informações**. Ele representa *qual* contexto outros componentes leem ou fornecem. Normalmente, você usará [SomeContext.Provider](https://react.dev/reference/react/createContext#provider) em componentes acima para especificar o valor do contexto e chamará [useContext(SomeContext)](https://react.dev/reference/react/useContext) em componentes abaixo para lê-lo. O objeto de contexto possui algumas propriedades:

- `SomeContext.Provider` permite que você forneça o valor do contexto para os componentes.
- `SomeContext.Consumer` é uma alternativa e raramente usada para ler o valor do contexto.

## SomeContext.Provider

Envolva seus componentes em um provedor de contexto para especificar o valor deste contexto para todos os componentes internos:

```typescript
function App() {
  const [theme, setTheme] = useState('light');
  // ...
  return (
    <ThemeContext.Provider value={theme}>
      <Page />
    </ThemeContext.Provider>
  );
}
```

### Props

- `value`: O valor que você deseja passar para todos os componentes que lêem este contexto dentro deste provedor, não importa o quão profundo. O valor do contexto pode ser de qualquer tipo. Um componente que chama `[useContext(SomeContext)](https://react.dev/reference/react/useContext)` dentro do provedor recebe o valor do provedor de contexto correspondente mais interno acima dele.


## SomeContext.Consumer

Antes do `useContext` existir, havia uma forma mais antiga de ler o contexto:

```typescript
function Button() {
  // 🟡 Forma legada (não recomendada)
  return (
    <ThemeContext.Consumer>
      {theme => (
        <button className={theme} />
      )}
    </ThemeContext.Consumer>
  );
}
```

Embora essa forma mais antiga ainda funcione, o código novo deve ler o contexto com `[useContext()](https://react.dev/reference/react/useContext)` em vez disso:

```typescript
function Button() {
  // ✅ Forma recomendada
  const theme = useContext(ThemeContext);
  return <button className={theme} />;
}
```

### Props

- `children`: Uma função. O React chamará a função que você passar com o valor atual do contexto determinado pelo mesmo algoritmo que `[useContext()](https://react.dev/reference/react/useContext)`, e renderizará o resultado retornado por essa função. O React também reexecutará essa função e atualizará a interface sempre que o contexto dos componentes pai mudar.

## Uso

### Criando Contexto

O contexto permite que componentes [passem informações profundamente](https://react.dev/learn/passing-data-deeply-with-context) sem precisar passar explicitamente props.

Chame `createContext` fora de qualquer componente para criar um ou mais contextos.

```typescript
import { createContext } from 'react';

const ThemeContext = createContext('light');
const AuthContext = createContext(null);
```

`createContext` retorna um objeto de contexto. Os componentes podem ler o contexto passando-o para `[useContext()](https://react.dev/reference/react/useContext)`:

```typescript
function Button() {
  const theme = useContext(ThemeContext);
  // ...
}

function Profile() {
  const currentUser = useContext(AuthContext);
  // ...
}
```

Por padrão, os valores que eles recebem serão os valores padrão que você especificou ao criar os contextos. No entanto, por si só, isso não é útil porque os valores padrão nunca mudam.

O contexto é útil porque você pode **fornecer outros valores dinâmicos a partir dos seus componentes**:

```typescript
function App() {
  const [theme, setTheme] = useState('dark');
  const [currentUser, setCurrentUser] = useState({ name: 'Taylor' });

  // ...

  return (
    <ThemeContext.Provider value={theme}>
      <AuthContext.Provider value={currentUser}>
        <Page />
      </AuthContext.Provider>
    </ThemeContext.Provider>
  );
}
```

Agora o componente `Page` e quaisquer componentes internos, não importa quão profundos, “verão” os valores de contexto passados. Se os valores de contexto passados mudarem, o React re-renderizará os componentes que leem o contexto também.

[Leia mais sobre leitura e fornecimento de contexto e veja exemplos](https://react.dev/reference/react/useContext).







**Importando e Exportando Contexto de um Arquivo**

Muitas vezes, componentes em arquivos diferentes precisarão acessar o mesmo contexto. Por isso, é comum declarar contextos em um arquivo separado. Então, você pode usar a instrução `export` para tornar o contexto disponível para outros arquivos:

```typescript
// Contexts.js
import { createContext } from 'react';

export const ThemeContext = createContext('light');
export const AuthContext = createContext(null);
```

Componentes declarados em outros arquivos podem então usar a instrução `import` para ler ou fornecer esse contexto:

```typescript
// Button.js
import { ThemeContext } from './Contexts.js';

function Button() {
  const theme = useContext(ThemeContext);
  // ...
}
```

```typescript
// App.js
import { ThemeContext, AuthContext } from './Contexts.js';

function App() {
  // ...
  return (
    <ThemeContext.Provider value={theme}>
      <AuthContext.Provider value={currentUser}>
        <Page />
      </AuthContext.Provider>
    </ThemeContext.Provider>
  );
}
```

Isso funciona de maneira similar à importação e exportação de componentes.








**Resolução de Problemas**

**Não consigo encontrar uma maneira de mudar o valor do contexto**

Código como este especifica o valor padrão do contexto:

```typescript
const ThemeContext = createContext('light');
```

Esse valor nunca muda. O React usa esse valor apenas como uma fallback se não encontrar um provedor correspondente acima.

Para fazer o contexto mudar com o tempo, adicione estado e envolva os componentes em um provedor de contexto.
