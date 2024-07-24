import estilo from "./ContactMeMiddleRight.module.scss";

export default function ContactMeMiddleRight() {
    return (
        <form className={estilo.form}>
            <div>
                <div>
                    <label htmlFor="nome" hidden>
                        Nome
                    </label>
                    <input type="text" placeholder="Nome" id="nome" />
                </div>
                <div>
                    <label htmlFor="whatsapp" hidden>
                        Whatsapp
                    </label>
                    <input type="text" placeholder="Whatsapp" id="whatsapp" />
                </div>
            </div>
            <div>
                <div>
                    <label htmlFor="telefone" hidden>
                        Telefone
                    </label>
                    <input type="text" placeholder="Telefone" id="telefone" />
                </div>
                <div>
                    <label htmlFor="orcamento" hidden>
                        Orçamento em R$
                    </label>
                    <input
                        type="text"
                        placeholder="Orçamento em R$"
                        id="orcamento"
                    />
                </div>
            </div>
            <div>
                <label htmlFor="mensagem" hidden>
                    Mensagem
                </label>
                <textarea
                    name="mensagem"
                    id="mensagem"
                    cols={30}
                    rows={10}
                    placeholder="Mensagem"
                ></textarea>
            </div>
        </form>
    );
}
