export interface Ordem {
    created_at: string;
    id: number;
    ordem: number;
    ordenavel: Ordenavel;
    ordenavel_id: number;
    ordenavel_type: string;
    updated_at: string;
}

// Grupo ou postagem
export interface Ordenavel {
    created_at: string;
    descricao: string;
    grupo_pai_id: number | null;
    id: number;
    is_grupo: boolean;
    ordenacao_grupo?: OrdenacaoGrupo[];
    titulo: string;
    slug: string;
    updated_at: string;
}

export interface OrdenacaoGrupo {
    created_at: string;
    grupo_id: number | null;
    id: number;
    ordem: number;
    ordenavel?: Ordenavel;
    ordenavel_id: number;
    ordenavel_type: string;
    updated_at: string;
}

export interface TextoOrdenacao {
    created_at: string;
    id: number;
    ordem: number;
    postagem_id: number;
    texto_id: number;
    updated_at: string;
    texto: Texto;
}

export interface Texto {
    created_at: string;
    descricao: string;
    id: number;
    postagem_id: number;
    titulo: string;
    updated_at: string;
}
