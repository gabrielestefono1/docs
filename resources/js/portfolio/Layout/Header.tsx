import { Link, usePage } from '@inertiajs/react';
import estilo from './Header.module.scss';
import imagem from './logo.webp';
import { useState } from 'react';
import SideBar from '../Components/HeaderComponents/SideBar';

export default function Header() {
    const rotaAtual = usePage();

    const [clicked, setClicked] = useState<boolean>(false);

    const [rota, setRota] = useState(rotaAtual.url);

    if(rotaAtual.url != rota){
        setClicked(false);
        setRota(rotaAtual.url);
    }

    const handleSideBar = () => {
        setClicked(!clicked);
    }
    return(
        <>
            <div className={`${estilo.header} ${clicked ? estilo.fixed : ''}`}>
                <div>
                    <div className={estilo.left}>
                        <a href="/"><img src={imagem} alt='Logotipo WeBest' width={132} height={61}/></a>
                    </div>
                    <div className={estilo.right}>
                        <Link rel='preload' className={`${estilo.link} ${rotaAtual.url == "/" ? estilo.active : ""}`} href="/">Início</Link>
                        <Link rel='preload' className={`${estilo.link} ${rotaAtual.url == "/sobre" ? estilo.active : ""}`} href="/sobre">Sobre mim</Link>
                        <Link rel='preload' className={`${estilo.link} ${rotaAtual.url == "/projetos" ? estilo.active : ""}`} href="/projetos">Projetos</Link>
                        <Link rel='preload' className={`${estilo.link} ${rotaAtual.url == "/habilidades" ? estilo.active : ""}`} href="/habilidades">Habilidades</Link>
                        <Link rel='preload' className={`${estilo.link} ${rotaAtual.url == "/contato" ? estilo.active : ""}`} href="/contato">Contato</Link>
                        <button onClick={handleSideBar}>
                            {clicked ? (
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M4.75 4.75l14.5 14.5M19.25 4.75L4.75 19.25" />
                                    </svg>
                            ) : (
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                            )}
                        </button>
                    </div>
                </div>
            </div>
            {clicked ?
                (
                        <SideBar rotaAtual={rotaAtual.url} />
                ) : (
                    <>
                    </>
                )}
        </>
    )
}