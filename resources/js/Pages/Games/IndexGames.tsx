import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";

export default function IndexGames({ auth }: PageProps<{}>) {
  return <VisitanteLayout auth={auth} title="Teste">
            <h1>Teste</h1>
        </VisitanteLayout>;
  

}