import VisitanteLayout from '@/Layouts/VisitanteLayout'
import { PageProps } from '@/types'
import React from 'react'

const GameIndividual = ({ auth, games }: PageProps<{ games: any }>) => {
  return (
    <VisitanteLayout auth={auth} title="Teste">
        <div className=""></div>
    </VisitanteLayout>
  )
}

export default GameIndividual