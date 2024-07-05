import Layout from '../Layout/Layout';
import Main from '../Components/main';

interface ReactProps {
    categorias: Categoria[];
    textos: Texto[];
    auth: any;
    errors: any;
}

export interface Texto{
    id: number;
    titulo: string;
    corpo: string;
    post_id: number;
    created_at: Date
    updated_at: Date;
}

export interface Categoria{ 
    id: number, 
    nome: string, 
    created_at: Date, 
    updated_at: Date
    posts: Post[]
    grupos: Grupo[]
}

export interface Post{
    id: number;
    title_aside: string;
    slug: string,
    filho: boolean,
    id_pai: null | number;
    categoria_id: number; 
    created_at: Date,
    updated_at: Date
}

export interface Grupo{
    id: number;
    slug: string;
    title_aside: string;
    categoria_id: number; 
    created_at: Date,
    posts: Post[]
    updated_at: Date
}

export default function Docs({ auth, categorias, textos }: Readonly<ReactProps>) {
    return (
        <Layout title="Spring Framework Documentation :: Spring Framework">
            <Main />
        </Layout>
    );
}
