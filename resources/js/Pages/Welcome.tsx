import Content from '@/Components/content';
import Header from '@/Components/header/index';
import { Head } from '@inertiajs/react';

interface reactProps {
    categorias: Categoria[],
    auth: any,
    errors: any
}

export interface Categoria{ 
    id: number, 
    nome: string, 
    created_at: Date, 
    updated_at: Date
    posts: Post[]
}

export interface Post{
    id: number;
    title_aside: string;
    tem_filhos: boolean,
    filho: boolean,
    id_pai: null | number;
    categoria_id: number; 
    created_at: Date,
    updated_at: Date
}

export default function Welcome({ auth, categorias }: Readonly<reactProps>) {
    return (
        <>
            <Head title="Portfolio" />
            <Header />
            <Content categorias={categorias} />
        </>
    );
}
