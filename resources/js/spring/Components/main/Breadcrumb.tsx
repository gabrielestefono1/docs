import { OrdenacaoGrupo } from "@/spring/interfaces/OrdenacaoGeral";
import { Link, usePage } from "@inertiajs/react";

interface BreadcrumbProps {
    titulo: string;
    filhos?: OrdenacaoGrupo[];
    slug: string;
}

export default function Breadcrumb({
    titulo,
    filhos,
    slug,
}: Readonly<BreadcrumbProps>) {
    const { url } = usePage();
    const itemAtual = filhos?.find((el) => url.includes(el.ordenavel!.slug));
    return (
        <>
            <span>/</span>
            <Link href={`/${slug}`}>{titulo}</Link>
            {itemAtual && (
                <Breadcrumb
                    titulo={itemAtual.ordenavel!.titulo ?? ""}
                    filhos={itemAtual.ordenavel!.ordenacao_grupo}
                    slug={`${slug}/${itemAtual.ordenavel!.slug ?? ""}`}
                />
            )}
        </>
    );
}
