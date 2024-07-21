import {
    createContext,
    Dispatch,
    ReactNode,
    SetStateAction,
    useState,
    useMemo,
} from "react";
import { Titulo } from "../interfaces/OrdenacaoGeral";

interface TituloContextProps {
    data: Titulo[];
    setData: Dispatch<SetStateAction<Titulo[]>>;
}

const TituloContext = createContext<TituloContextProps>({
    data: [],
    setData: () => {},
});

const TitulosContextProvider = ({ children }: { children: ReactNode }) => {
    const [data, setData] = useState<Titulo[]>([]);

    const value = useMemo(() => ({ data, setData }), [data, setData]);

    return (
        <TituloContext.Provider value={value}>{children}</TituloContext.Provider>
    );
};

export { TituloContext , TitulosContextProvider };
